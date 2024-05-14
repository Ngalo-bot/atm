import requests
import time
import socket
import threading
import pymysql
from pyzkfp import ZKFP2
import serial

# Global boolean variables
cont = 0
zkfp2_connected = True

globalThing = 1

zkfp2 = ZKFP2()
zkfp2.Init()

zkfp2.OpenDevice(0)


def verify_template(reader, verify_temp, reg_temp):
    result = reader.DBMatch(verify_temp, reg_temp)
    return result


def verify_login_against_database(reader, verify_temp):
    db_connection = pymysql.connect(host='localhost',
                                    user='root',
                                    password='',
                                    database='atmdb',
                                    charset='utf8mb4',
                                    cursorclass=pymysql.cursors.DictCursor)

    try:
        with db_connection.cursor() as cursor:
            # Fetch all rows from the fingerprint_templates table
            sql = "SELECT user_id, template FROM fingerprint_templates WHERE status = 1"
            cursor.execute(sql)
            templates_from_db = cursor.fetchall()

            # Verify against each template in the database
            for row in templates_from_db:
                db_template = row['template']  # Retrieve template from the database
                result = verify_template(reader, verify_temp, db_template)
                if result:
                    # Update the row with ID=1
                    # sql = "UPDATE fingerprint_flag SET auth_state = %s, user_id = %s WHERE id = %s"
                    # values = ("1", str(row['user_id']), 1)
                    # cursor.execute(sql, values)
                    # # Commit the changes
                    db_connection.commit()
                    return True, row['user_id']

        return False, None
    except Exception as e:
        print(f"Error during database verification: {e}")
        return False, None
    finally:
        db_connection.close()


def verify_against_database(reader, verify_temp,user_id):
    db_connection = pymysql.connect(host='localhost',
                                    user='root',
                                    password='',
                                    database='atmdb',
                                    charset='utf8mb4',
                                    cursorclass=pymysql.cursors.DictCursor)

    try:
        with db_connection.cursor() as cursor:
            # Fetch all rows from the fingerprint_templates table
            sql = "SELECT template FROM fingerprint_templates WHERE user_id = ?"
            cursor.execute(sql,(user_id,))
            templates_from_db = cursor.fetchall()

            # Verify against each template in the database
            for row in templates_from_db:
                db_template = row['template']  # Retrieve template from the database
                result = verify_template(reader, verify_temp, db_template)
                if result:
                    # Update the row with ID=1
                    # sql = "UPDATE fingerprint_flag SET auth_state = %s, user_id = %s WHERE id = %s"
                    # values = ("1", str(row['user_id']), 1)
                    # cursor.execute(sql, values)
                    # # Commit the changes
                    db_connection.commit()
                    return True, row['user_id']

        return False, None
    except Exception as e:
        print(f"Error during database verification: {e}")
        return False, None
    finally:
        db_connection.close()


#ENROLLLLLLLLL
    
def enroll(user_id):
    
    print(user_id)
    globalThing = 1
    if user_id is None:
        return print({'error': 'User ID is required for enrollment'})
    
    db_connection = pymysql.connect(host='localhost',
                                    user='root',
                                    password='',
                                    database='atmdb',
                                    charset='utf8mb4',
                                    cursorclass=pymysql.cursors.DictCursor)
    try:
        with db_connection.cursor() as cursor:
            # Check if the user_id already exists in the database
            sql_check_user = "SELECT COUNT(*) FROM fingerprint_templates WHERE user_id = %s"
            cursor.execute(sql_check_user, (user_id,))
            user_exists = cursor.fetchone()['COUNT(*)']
            if user_exists > 0 and len(user_id) > 0 :
                return print({'error': f'User {user_id} already exists'})
                
            try:
                print("a")
                templates = []
                print("b")
                state=0
                for i in range(3):
                    while True:
                        capture = zkfp2.AcquireFingerprint()
                        if capture:
                            print("a")
                            v=i + 1
                            print(f'Fingerprint captured for User {user_id}, Template {v}')
                            msg=f'Template Captured {v}'
                            if v==3:
                                state=1
                            else:
                                state=v
                            url = 'http://localhost/atm/process.php'
                            data = {
                                'msg': msg,
                                'user_id':user_id,
                                'state':state
                                }
                            response = requests.post(url, data=data)
                            print(response.text)
                            tmp, _ = capture
                            templates.append(tmp)
                            break
                        
                reg_temp, reg_temp_len = zkfp2.DBMerge(*templates)
                reg_temp = bytes(reg_temp)

                # Save the enrollment template in the database
                sql_insert_template = "INSERT INTO fingerprint_templates (user_id, template,status) VALUES (%s, %s , %s)"
                cursor.execute(sql_insert_template, (user_id, reg_temp, 1))
                db_connection.commit()
                print(f'Templates for User {user_id} saved in the database')
               
                templates.clear()
                url = 'http://localhost/atm/process.php'
                msg='Completed'
                data = {
                    'msg': msg,
                    'user_id':user_id,
                    'state':1
                    }
                response = requests.post(url, data=data)
                return print({'message': f'Enrollment completed for User {user_id}'})
            
            
            except Exception as e:
                return print({'message': f'Error during device initialization or opening: {str(e)}'})
    except Exception as e:
        print(f"Error during database operation: {e}")
        return print({'message': 'Error during enrollment'})
    finally:
        db_connection.close()


def verify(user_id):
    # reader=zkfp2
    print("starting to verify")
    
    try:
        
        while True:
            capture = zkfp2.AcquireFingerprint()
          
            if capture:
                print('Fingerprint captured for verification by')
                print(zkfp2)
                verify_temp, img = capture
                verification_result, user_id = verify_against_database(zkfp2, verify_temp)
                if verification_result:
                    zkfp2.Light('green')
                    print("VERIFIED CORRECT",user_id)
                    print('-------------')
                   

                    return {'user_id': user_id, 'auth_state': True}
                    break
                else:
                    zkfp2.Light('red')
                    print("UNVERIFIED")
                    return {'auth_state': False}
                    break
        print("here222")
    except Exception as e:
       print(str(e))

def verify_login(user_id):
    # reader=zkfp2
    print("starting to verify")
    
    try:
        
        while True:
            capture = zkfp2.AcquireFingerprint()
          
            if capture:
                print('Fingerprint captured for verification by')
                print(zkfp2)
                verify_temp, img = capture
                verification_result, user_id = verify_login_against_database(zkfp2, verify_temp)
                if verification_result:
                    zkfp2.Light('green')
                    print("VERIFIED CORRECT",user_id)
                    url = 'http://localhost/atm/put_into_process.php'
                    
                    data = {
                        
                        'userID':user_id,
                        
                        }
                    res = requests.post(url, data=data)
                    print(res.status_code)
                    print(res.text)


                    return {'user_id': user_id, 'auth_state': True}
                    break
                else:
                    zkfp2.Light('red')
                    print("UNVERIFIED")
                    return {'auth_state': False}
                    break
        print("here222")
    except Exception as e:
       print(str(e))
       


# def commander_Welcome(gate_id):
#     arduino_port = 'COM8'  # Update with the correct port
#     baud_rate = 9600
#     # Initialize the serial connection
#     # Modify this function to control the gate with the given gate_id
#     print(f"Opening gate: {gate_id}")
#     ser = serial.Serial(arduino_port, baud_rate)
#     # Send a command to the Arduino
#     command = 'WELCOME'  # Replace with your desired command
#     ser.write(command.encode())
#     # Close the serial connection
#     ser.close()

#FUNCTION TO SEND ENROLL MESSAGE TO SERIAL
# def enrolling():
#     arduino_port = 'COM8'  
#     baud_rate = 9600
#     ser = serial.Serial(arduino_port, baud_rate)
#     # Send a command to the Arduino
#     command = ' ****ENROLLING***** ' 
#     ser.write(command.encode())    
#     ser.close()



# def commander_Exit(gate_id):
#     arduino_port = 'COM8'  # Update with the correct port
#     baud_rate = 9600
#     # Modify this function to control the gate with the given gate_id
#     print(f"Opening gate: {gate_id}")
#     # Initialize the serial connection
#     ser = serial.Serial(arduino_port, baud_rate)
#     # Send a command to the Arduino
#     command = 'GOODBYE'  # Replace with your desired command
#     ser.write(command.encode())
#     # Close the serial connection
#     ser.close()



# Function to modify the global boolean
def controller_fx(value):
    global cont
    cont = value
    print(f"Value modified to: {value}")


# Function with a thread to print the global boolean
def print_boolean_thread(reader, gate_id):
    global cont
    print(cont)
    # while True:

    #     if cont == 0:
    #         verify(reader, gate_id)
    #         #check_device_connection(reader,gate_id)
    #     elif cont == 1:
    #         # Add the desired action for 'readery'
    #         print("Perform action for 'readery'")
    #     elif cont == 2:
    #         # Add the desired action for 'readerx'
    #         print("Perform action for 'readerx'")
    #     elif cont == 3:
    #         # Add the desired action for 'readerw'
    #         enroll(gate_id)
    #         print("Perform action for 'readerw'")


thread1 = threading.Thread(target=print_boolean_thread, args=(zkfp2, 'readery'))

thread1.start()


server_socket=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
server_socket.bind(('localhost',8080))
server_socket.listen(1)
print("Listening socket...")




def handle_client(client_socket, client_address):
    message = client_socket.recv(1024).decode()
    print(message)    

    if message.startswith('enroll'):
        # Extract the user_id from the message
        user_id = message.split('-')[1]
        print("enrolling.....",user_id)
        enroll(user_id)
    elif message.startswith('verify'):
        user_id = message.split('-')[1]
        print("verifying.....",user_id)
        verify(user_id)
    elif message.startswith('login'):
        user_id = message.split('-')[1]
        print("verifying.....",user_id)
        verify_login(user_id)

# Rest of the code
while True:
    client_socket, client_address = server_socket.accept()
    print(f"Connection from {client_address} established.")
    threading.Thread(target=handle_client, args=(client_socket, client_address)).start()

# server_socket=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
# server_socket.bind(('localhost',8080))

# while True:
#     server_socket.listen(1)
#     print("Listening socket...")

#     client_socket,addr=server_socket.accept()
#     print('conncted by ',addr)

#     msg=client_socket.recv(1024).decode()
#     print('It is- ',msg)



# url="http://localhost/Atm/index.php"
# data={
#     "logged":"logged"
# }
# while True:
#     res=requests.post(url,data=data)

#     print(res.status_code)
#     time.sleep(2)
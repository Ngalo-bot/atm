import socket

while True:
    server_socket=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
    server_socket.bind(('localhost',8080))
    server_socket.listen(1)
    print("Listening socket...")

    client_socket, client_address = server_socket.accept()
    message = client_socket.recv(1024).decode()
    print(message)    

    if message.startswith('enroll'):
        # Extract the user_id from the message
        user_id = message.split('-')[1]
        print("enrolling.....",user_id)
        
    elif message.startswith('verify'):
        user_id = message.split('-')[1]
        print("verifying.....",user_id)
    
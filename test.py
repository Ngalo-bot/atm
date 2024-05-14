import requests

url = 'http://localhost/atm/put_into_process.php'
user_id="5CF5VEBXE2"
data = {
    
    'userID':user_id,
    
    }
# while Tr
response = requests.post(url, data=data)
print(response.text)
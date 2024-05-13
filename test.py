import requests

url = 'http://localhost/atm/stand.php'
user_id="5CF5VEBXE2"
data = {
    
    'user_id':user_id,
    
    }
# while Tr
response = requests.post(url, data=data)
print(response.text)
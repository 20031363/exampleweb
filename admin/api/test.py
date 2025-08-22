import requests

url = "http://localhost/vinedo/admin/api/productos.php"

payload = {}
headers = {}

response = requests.request("GET", url, headers=headers, data=payload)

print(response.text)
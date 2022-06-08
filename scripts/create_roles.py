from roles import DOCTOR_ROLES, FRONT_DESK_ROLES, DOCTOR

import requests
import json

URL = "https://payments-lite.mybahmni.in/"

LOGIN_URL = URL + "api/v1/auth/login/"
ROLES_URL = URL + "api/v1/roles"

# get authorization token

headers = {
  'company': '1',
  'Content-Type': 'application/json'
}

payload = json.dumps({
  "username": "infrastructure@bahmni.org",
  "password": "Admin123",
  "device_name": "mobile_app"
})

response = requests.request("POST", LOGIN_URL, headers=headers, data=payload)

print(response.text)

headers['Authorization'] = 'Bearer ' + response.json()['token']

print(headers)

# create doctor role

payload = json.dumps({
  "name": "doctor test",
  "abilities": DOCTOR_ROLES
})

response = requests.request("POST", ROLES_URL, headers=headers, data=payload)

print(response.text)

# create front desk role

payload = json.dumps({
  "name": "front desk test",
  "abilities": FRONT_DESK_ROLES
})

response = requests.request("POST", ROLES_URL, headers=headers, data=payload)

print(response.text)

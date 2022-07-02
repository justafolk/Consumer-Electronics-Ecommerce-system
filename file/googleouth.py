from google.oauth2 import id_token
from google.auth.transport import requests
import sys

# (Receive token by HTTPS POST)
# ...
if len(sys.argv) != 3:
    print("Not Enough Arguments")
    sys.exit()
token, gscrf = sys.argv[1:3] 
CLIENT_ID = "438943076807-seaq0aed036lr76i76nq5ohc88jn9sd6.apps.googleusercontent.com"
import json

try:
    # Specify the CLIENT_ID of the app that accesses the backend:
    idinfo = id_token.verify_oauth2_token(token, requests.Request(), CLIENT_ID)
    # Or, if multiple clients access the backend server:
    # idinfo = id_token.verify_oauth2_token(token, requests.Request())
    # if idinfo['aud'] not in [CLIENT_ID_1, CLIENT_ID_2, CLIENT_ID_3]:
    #     raise ValueError('Could not verify audience.')

    # If auth request is from a G Suite domain:
    # if idinfo['hd'] != GSUITE_DOMAIN_NAME:
    #     raise ValueError('Wrong hosted domain.')

    print(json.dumps(idinfo))
    # ID token is valid. Get the user's Google Account ID from the decoded token.
    userid = idinfo['sub']
except ValueError:
    # Invalid token
    pass


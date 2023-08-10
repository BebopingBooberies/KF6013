# script.py

import json
from config import config

# Accessing the JSON data from the config dictionary
web_data = config["web"]

# Now working with JSON data using Python
client_id = web_data["client_id"]
client_secret = web_data["client_secret"]
javascript_origins = web_data["javascript_origins"]

print("Client ID:", client_id)
print("Client Secret:", client_secret)
print("JavaScript Origins:", javascript_origins)
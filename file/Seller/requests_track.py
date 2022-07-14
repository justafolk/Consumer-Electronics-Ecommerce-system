import requests
import json
from bs4 import BeautifulSoup
import sys 
id = sys.argv[1]
data = {}

def get_data(id):
    data = {}
    url = "http://track.dtdc.com/ctbs-tracking/customerInterface.tr?submitName=showCITrackingDetails&cType=Consignment&cnNo="+id
    r = requests.get(url)
    soup = BeautifulSoup(r.text, 'html.parser')
    data['id'] = id
    data['status'] = soup.find('input', {'id': 'internetstatus'})['value']
    data['description'] = soup.find('td', {'id': 'lstStausDt'}).text
    return data["status"]

print(get_data(id))

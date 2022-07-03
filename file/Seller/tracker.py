from selenium.webdriver import Firefox
from selenium.webdriver.firefox.options import Options as FirefoxOptions

options = FirefoxOptions()
options.add_argument("--headless")
browser = Firefox(options=options)
def Track(number):
    url = "http://track.dtdc.com/ctbs-tracking/customerInterface.tr?submitName=showCITrackingDetails&cType=Consignment&cnNo="+str(number)
    browser.get(url) 
    print(browser.find_element_by_xpath("/html/body/table/tbody/tr/td/div[2]/div/div/div/span[1]").text)

import sys

# (Receive token by HTTPS POST)
# ...
if len(sys.argv) != 2:
    print("Not Enough Arguments")
    sys.exit()
token = sys.argv[1] 

Track(token)
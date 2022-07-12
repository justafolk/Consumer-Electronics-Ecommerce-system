a= "Create table zipcodes(country varchar(2), zipcode int, postname varchar(255), state varchar(255), idk int, city varchar(255), idk2 int, taluka varchar(255), lat float, long, float, idk3 int);"

f = open("./IN.txt", "r").readlines()
i = 0
sf = open("zipcodes.sql", "w+")
for i in f:
    s = "insert into zipcodes(country, zipcode, postname, state, idk, city, idk2, taluka, lat, longt, idk3) values("
    print(i.split("\t"))
    for j in i.split("\t"):
        if len(j) < 1:
            continue
        s += "'"+j.replace("\n", "")+"',"
    s = s[:-1]+");"
    print(s)
    break
sf.close()

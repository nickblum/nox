
import MySQLdb
import datetime

# Open database connection

## testuser
## testuser12345
'''
db = MySQLdb.connect("localhost","testuser","testuser12345","forest" )

# prepare a cursor object using cursor() method
cursor = db.cursor()

# Select qSQL with id=4.
cursor.execute("INSERT INTO nick_test (stuff) VALUES ('" + datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S") + "')")

db.commit()

# disconnect from server
db.close()
'''

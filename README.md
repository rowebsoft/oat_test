# oat_test
OAT Practical Exercise - get test takers api - rest

As a Backend developer you choose to focus on your speciality and work on the server side.

As a reminder, the goal of the backend exercise is to create a REST web service that returns a list of users.
You have 2 files that contain data to help you (testtaker.json and testtaker.csv) to test your service.
Both files contain the same data, they are just provided as a potential source to feed your web service.

Nice to have: As per the generalisation/flexibility, you may want to take into account that the source of the data JSON or CSV might change in the future.

Here is the client you will have to feed with data. To do so, please input your endpoints URL in the form below, then go to the client page.

This client expects to receive the data as a JSON content, and requires two endpoints: one to get the list of all users, and another one to get more info on one user. The list of users should be formatted as an array of user entities, and should accept a parameter to filter the data (search mode). The single user service should return a single user entity, corresponding to the provided identifier.

Both services are called using the GET method.

Enjoy your exercise, and may the code be with you! The OAT Dev Team...

URL for all users
https://hr.oat.taocloud.org/v1/users?limit=100
Define the URL of your service API that will return all users. You may add placeholders for some parameters:
{{limit}}: will be replaced by the number of expected rows
{{offset}}: will be replaced by the start offset
{{filter}}: will be replaced by the value of the current filter in the UI
For instance, you may enter this url: https://hr.oat.taocloud.org/v1/users?limit={{limit}}&offset={{offset}}&name={{filter}}

Or you may also simply take care of the filter value: https://hr.oat.taocloud.org/v1/users?name={{filter}}

URL for one user
http://hostname/user/id
Define the URL of your service API that will return one particular user, by its identifier. You may add placeholders for some parameters:
{{user}}: will be replaced by the identifier of the expected user
For instance, you may enter this url: https://hr.oat.taocloud.org/v1/user/{{user}}

Entity ID
userId
Define the name if the data key that should contain the user identifier in each returned row
Page size
10
Define the number of rows displayed on page. This does not affect the query.
Rows limit
100
Define the number of expected rows the service should return
Rows offset


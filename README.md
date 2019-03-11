# opensim-web-login
A Functioning Web Login Implementation for OpenSim

# TODO
* Add Functionality for it to return Data about the user, either as a Session or as OAuth "like" scopes


if we do the scope then the following values need to be in the url when you start at index.php

client_id= <uuid stored in a separate web services database>
redirect_uri=< encoded url to go to if all goes well>
response_type=code
scope=< we need to decide on scopes>
state= <I don't know what this is for??

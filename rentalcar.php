<?php

/////////////////////////////////////////////////////////////////////////////
// Function to spit out the HTTP "401 Unauthorized" content
function unauthorized() {
  header('HTTP/1.0 401 Unauthorized');
  header('WWW-Authenticate: Basic realm="Rental Car"');
  echo 'Please enter your NetID and password';
  exit;
}
/////////////////////////////////////////////////////////////////////////////

// First, make sure we're using HTTPS and redirect the user if we're not
if (!isset($_SERVER['HTTPS'])) {
  header("Refresh: 0;url=https://www.umass.edu$_SERVER[REQUEST_URI]");
  print ' ';
  exit;
}

// Next, make them authenticate
if (!isset($_SERVER['PHP_AUTH_USER'])) unauthorized();

// Attempt to sanitize our uid for good measure. We won't even attempt to sanitize the password because it's
// not embedded in any literal strings and because we never know what Unicode craziness it might contain.
$uid = preg_replace('/[^a-zA-Z0-9-]/', '', $_SERVER['PHP_AUTH_USER']);
$pw = $_SERVER['PHP_AUTH_PW'];

// Establish a connection to our LDAP server
if (!$ldapconn = ldap_connect('ldaps://ldap-auth.oit.umass.edu/')) {
  print 'Unable to connect to LDAP server';
  exit;
}

// Due to a bug in PHP/OpenLDAP, we must explicitly set our LDAP protocol version to 3 for the bind to work
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

// Attempt to bind using the given uid and password. If this works, the credentials are valid!
if (!ldap_bind($ldapconn, "uid=$uid,ou=people,dc=umass,dc=edu", $pw)) unauthorized();

// Redirect the user to the Enterprise page for UMass
header('Refresh: 0;url=http://www.enterprise.com/car_rental/deeplinkmap.do?bid=028&refId=UMASS10');
print ' ';

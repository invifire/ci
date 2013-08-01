<?php
echo getenv('OPENSHIFT_MYSQL_DB_HOST') . ':' . getenv('OPENSHIFT_MYSQL_DB_PORT');
echo getenv('OPENSHIFT_MYSQL_DB_PASSWORD'). ':pass<br>';
echo getenv('OPENSHIFT_MYSQL_DB_USERNAME'). ':USERNAME<br>';
echo getenv('OPENSHIFT_MYSQL_DB_URL'). ':URL<br>';
echo getenv('OPENSHIFT_MYSQL_DB_PORT'). ':PORT<br>';

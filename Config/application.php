<?php
// global app config
Configure::write('App.name', 'Life');
Configure::write('App.description', 'Life game');
Configure::write('App.authors', array('Alvin Lam'));
Configure::write('App.url', 'http://life.localhost');

// database constants
Configure::write('Role.master', 1);
Configure::write('Role.admin', 2);
Configure::write('Role.agent', 3);

<?php
// global app config
Configure::write('App.name', 'Pokemon Life');
Configure::write('App.description', 'Pokemon Life game Beta');
Configure::write('App.authors', array('Alvin Lam'));
Configure::write('App.url', 'http://life.localhost');

// database constants
Configure::write('Role.master', 1);
Configure::write('Role.admin', 2);
Configure::write('Role.agent', 3);


Configure::write('Pokedex.source.url', 'http://pokemondb.net/pokedex/all');
Configure::write('PokemonSkill.source.url', 'http://pokemondb.net/move/generation/1');
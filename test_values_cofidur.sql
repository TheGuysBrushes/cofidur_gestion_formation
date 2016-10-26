Insert into fos_user (enabled, locked, expired, credentials_expired, salt, roles, 
	username, username_canonical, password, email, email_canonical, first_name, last_name)
VALUES(true, 0, 0, 0, 'hrgn8jj64xcs8swwskgg48kw48gw88g', "ROLE_ADMIN", 
	'flodavid', 'flodavid', '$2y$13$hrgn8jj64xcs8swwskgg4uaJvsb.0W3JGqK1tW5IVLliT8fry7WZm', 'flodavid@univ-angers.fr', 'flodavid@univ-angers.fr', 'Florian', 'David');
	
Insert into fos_user (enabled, locked, expired, credentials_expired, salt, roles, 
	username, username_canonical, password, email, email_canonical, first_name, last_name)
VALUES(true, 0, 0, 0, 'of7gew710qo08scgc8gsocgc0ockgw8', "ROLE_ADMIN", 
	'ascris', 'ascris', '$2y$13$of7gew710qo08scgc8gsoOukkMz.XYFw5z6.VnNLOc7ecQZHGnWLi', 'antoine.garnier@etud.univ-angers.fr', 'antoine.garnier@etud.univ-angers.fr', 'Antoine', 'Garnier');

Insert into fos_user (enabled, locked, expired, credentials_expired, salt, roles, 
	username, username_canonical, password, email, email_canonical, first_name, last_name)
VALUES(true, 0, 0, 0, 'lssxsdpnny80gk8w0so0owc484wcw00', "ROLE_ADMIN", 
	'vdeleeuw', 'vdeleeuw', '$2y$13$lssxsdpnny80gk8w0so0ouRYyAUsrdOK58J2iqIzDPhNBhMwhKXqi', 'valerian.deleuuw@etud.univ-angers.fr', 'valerian.deleuuw@etud.univ-angers.fr', 'Valérian', 'Deleeuw');

/* Password : root */
Insert into fos_user (enabled, locked, expired, credentials_expired, salt, roles, 
	username, username_canonical, password, email, email_canonical, first_name, last_name)
VALUES(true, 0, 0, 0, '3mn60uyacqgwg40g4sksoggs48s4kcs', "ROLE_ADMIN", 
	'root', 'root', '$2y$13$lmvz33jn9bkscw4c0cs4kuxBE18.gv4U0xKzUwMmWv4/U9L7/yxSu', 'root@root.fr', 'root@root.fr', 'Root', 'Root');

/* Password : user */
Insert into fos_user (enabled, locked, expired, credentials_expired, salt, roles, 
	username, username_canonical, password, email, email_canonical, first_name, last_name)
VALUES(true, 0, 0, 0, 'lmvz33jn9bkscw4c0cs4k44ws888s48', "ROLE_USER", 
	'user', 'user', '$2y$13$lmvz33jn9bkscw4c0cs4kuxBE18.gv4U0xKzUwMmWv4/U9L7/yxSu', 'user@user.fr', 'user@user.fr', 'User', 'User');

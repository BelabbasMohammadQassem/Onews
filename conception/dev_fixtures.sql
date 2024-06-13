INSERT INTO `user` (`user_name`) VALUES ('Benjamin');
INSERT INTO `user` (`user_name`) VALUES ('Greg');
INSERT INTO `user` (`user_name`) VALUES ('Mohammad');
INSERT INTO `user` (`user_name`) VALUES ('Caroline');
INSERT INTO `user` (`user_name`) VALUES ('Clément');

INSERT INTO `comment` (`user_id`, `rating`, `content`)
VALUES 
('1', '2', 'Super voyage c était top')
,('2', '2', 'Trop bien')
,('2', '3', 'Génial')
,('2', '3', 'Génial')
,('3', '3', 'Génial')
,('4', '3', 'Génial')
,('2', '3', 'Génial')
;

INSERT INTO `trip` (`trip_img`) VALUES ('avatar.png');
INSERT INTO `trip` (`trip_name`) VALUES ('Qassem');
INSERT INTO `trip` (`description`) VALUES ('I m Dark Vador');
INSERT INTO `trip` (`destination`) VALUES ('New York');
INSERT INTO `trip` (`price`) VALUES ('5 euros');
INSERT INTO `trip` (`duration`) VALUES ('1h');
INSERT INTO `trip` (`nextdeparture`) VALUES ('demain');


INSERT INTO `Comment` (`rating`) VALUES ('5');
INSERT INTO `Comment` (`content`) VALUES ('Qassem');
INSERT INTO `Comment` (`trip`) VALUES ('Anakin');
INSERT INTO `Comment` (`trip_name`) VALUES ('Dark Vador');
INSERT INTO `Comment` (`description`) VALUES ('Dark Vador n est pas ton pere');

INSERT INTO `Country` (`country_name`) VALUES ('New York');


INSERT INTO `Booking` (`booking_name`) VALUES ('Demain');

INSERT INTO `Tag` (`tag_name`) VALUES ('Demain');





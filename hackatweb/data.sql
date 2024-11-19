insert into inscription (id, date_saisie, idHackathon, idParticipants) values (1, '2024/08/01', 1, 2);
insert into inscription (id, date_saisie, idHackathon, idParticipants) values (2, '2024/06/30', 1, 5);
insert into inscription (id, date_saisie, idHackathon, idParticipants) values (3, '2024/11/18', 1, 1);
insert into evenement (id, nom, date, duree, salle, type, nb_places, intervenant, theme, hackathon_id) values (1, '2024/03/23', '2024/07/06', '4:09', "B195", "Atelier", 9, null, null, 1);
insert into evenement (id, nom, date, duree, salle, type, nb_places, intervenant, theme, hackathon_id) values (2, '2024/05/13', '2024/08/22', '10:33', "A155", "conf", null, "jean-marie Bigard", "La femme dans l'IT", 1);
insert into evenement (id, nom, date, duree, salle, type, nb_places, intervenant, theme, hackathon_id) values (3, '2024/03/21', '2024/07/18', '22:05', "C595", "Atelier", 3, null, null, 2);
insert into evenement (id, nom, date, duree, salle, type, nb_places, intervenant, theme, hackathon_id) values (4, '2024/03/25', '2024/05/11', '20:37', "B95", "conf", null, "Jules Pillot", "Farming simulator", 3);
insert into evenement (id, nom, date, duree, salle, type, nb_places, intervenant, theme, hackathon_id) values (5, '2024/09/18', '2024/04/28', '23:34', "A712", "Atelier", 7, null, null, 3);
insert into evenement (id, nom, date, duree, salle, type, nb_places, intervenant, theme, hackathon_id) values (6, '2024/08/12', '2024/05/14', '11:02', "C010", "conf", null, "Picart Loïc", "C#", 3);
insert into evenement (id, nom, date, duree, salle, type, nb_places, intervenant, theme, hackathon_id) values (7, '2023/12/27', '2024/05/08', '3:23', "A033", "Atelier", 1, null, null, 3);
insert into evenement (id, nom, date, duree, salle, type, nb_places, intervenant, theme, hackathon_id) values (8, '2024/11/05', '2024/04/26', '21:57', "G500", "conf", null, "Hugo Suire", "Pokemon", 3);
insert into evenement (id, nom, date, duree, salle, type, nb_places, intervenant, theme, hackathon_id) values (9, '2024/03/08', '2024/07/27', '1:22', "D477", "Atelier", 2, null, null, 2);
insert into evenement (id, nom, date, duree, salle, type, nb_places, intervenant, theme, hackathon_id) values (10, '2024/02/20', '2024/01/02', '5:33', "B195", "conf", null, "Thomas Patois", "Farming simulator", 2);
insert into participant_atelier (id, nom, prenom, email, idEvenement) values (1, 'Lolly', 'Vaugham', 'lvaugham0@prlog.org', 1);
insert into participant_atelier (id, nom, prenom, email, idEvenement) values (2, 'Urson', 'Neggrini', 'uneggrini1@webmd.com', 3);
insert into participant_atelier (id, nom, prenom, email, idEvenement) values (3, 'Kelcey', 'Yeoman', 'kyeoman2@netlog.com', 5);
insert into participant_atelier (id, nom, prenom, email, idEvenement) values (4, 'Wang', 'Golledge', 'wgolledge3@amazonaws.com', 7);
insert into participant_atelier (id, nom, prenom, email, idEvenement) values (5, 'Torrie', 'Lemarie', 'tlemarie4@xrea.com', 9);


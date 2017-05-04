1) MODELISATION DE LA BASE DE DONNEES //FINI


A) Entités 
-->  Joueur,Partie,Navire,Tour,Application,Cartes,Action;

B) Modèle relationnel // Fait 


--> Joueur ( pseudonyme,nom,prénom,sexe,date_naissance,ville_résidence,valeur_hachage_mdp )

--> Navire ( type,taille,lien_hypertexte,coordonnées,état, /*h,v*/ sens,position_proue /*h,g*/ ,code alphanumérique. )
 
--> Tour ( numéro, coordonnées_tir,information_tir)

--> Action ( déplacement, réparation,chgt_coordonnées)

--> Application (nb_parties_initiées,nb_partiesjouees, nb_partiesgagnees,nb_partiesperdues,ratio,nb_parties_bonusrare,nb_parties_carte bonus_Étoile_de_la_mort,nb_moyen_type_cartetirée,nb_partiesjouées_sans_aucune_carterare, nb_partiesjouées_plus10cartesrarestirées)

-->  Cartes (bonus,malus) 

--> Partie ( #code_alphanumérique,nb_moyen_tirs_avantvictoire)


2) CONNEXION A LA BASE DE DONNES // à faire


3) HTML,CSS,PHP // en cours

Dans le serveur bdw1, on nous a donné des fichiers php à remplir et tout importé dans le fichier acceuil.php dans lequel il y aura du php et du html. On nous dit quoi faire  mais il faut implémenter beaucoup de fonction surtout pour les statistiques. J'ai commencé à les écrire mais je ne pense pas qu'elles soit bonne ;
IL faut aussi afficher les cartes, et créer la grille , un matrice 10x10

--> Configuration serveur #Fait
--> Afficher la carte // à verifier

--> Afficher le message d'érreur lors du choix du pseudo et Afficher bonjour <pseudo> dans le cas contraire 

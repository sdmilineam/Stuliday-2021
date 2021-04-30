- Stuliday
            Le public ciblé concerne les jeunes dynamiques qui voyagent et qui
            souhaitent rencontrer de nouvelles personnes en leur proposant de
            partager leurs locations avec des inconnus et/ou des amis.
            Les locations devront être peu chères et tous les utilisateurs devront
            avoir le droit de réserver une annonce, mais aussi d’en poster.
            Les locations devront être disponibles dans le monde entier et
            donc l’interface devra être intégralement en anglais.
            La charte graphique est au choix et des logos de base sont fournis
            mais pourront être modifiés.


- users : 
    - username (varchar, 255, unique)
    - email (varchar, 255, unique)
    - password (varchar, crypted, no-char-limit)
    - role (varchar, 255)

- products :
    - name (varchar, 255)
    - description (text)
    - price (int, 10)
    - created_at (datetime)
    - author (id of user)
    - category (id of category)

- categories :
    - name (varchar, 255, unique)

Structure du back-end :

    - Create :
        - users : inscription
        - products : création de products via interface accessible aux users
        - categories : création de categories via interface accessible aux admins
    
    - Read :
        - users : connexion, et liste users via interface accessible aux admins
        - products : liste products via interface accessible aux visiteurs
        - categories : reliées aux products, tri par categories via recherche

    - Update :
        - users : modification username via interface accessible à l'user et l'admin
        - products : modification products via interface accessible à l'author et l'admin
        - categories : modification categories via interface accessible aux admins
    
    - Delete :
        - users : désinscription
        - products : suppression de products via interface accessible à l'author et l'admin
        - categories : suppression de categories via interface accessible aux admins    
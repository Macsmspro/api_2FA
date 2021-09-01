`1- URL API`

Notre api d'authentification à deux facteurs (2FA verify) est scindée en deux étapes. La première réservé à la génération et l'envoie du code de vérification, la deuxième étape pour la vérification. Ces étapes sont appelées respectivement par les urls` "https://macsmspro.com/api/verification.php"`, `"https://macsmspro.com/api/verificationCheck.php"`.


`2- CORPS DE LA REQUETE`


`Requête de génération du code`

`Le Nom`
Il s'agit du nom de votre service qui sera visible par vos utilisateurs.

`Le Message`
Il n'est rien d'autre que le contenu du message à envoyer. Reconnu dans le corps de la requête par la propriété message, il est requis et ne peut donc être NULL ou vide.

`Le téléphone`
Il représente le numéro de téléphone vers lequel la vérification sera effectuer, il doit être suvi de son indicatif, ne doit contenir aucun espace et ne peut être NULL ou vide.

`La durée d'expiration`
La durée d'expiration par défaut du code est de `30s`, vous pouvez changer ce paramètre en renseignant la valeur time dans votre requête

`La taille du code`
La taille par défaut du code est de `six (06) chiffre` , vous pouvez changer ce paramètre en renseignant la valeur codeLength dans votre requête

`Le token`
Il est question du token que vous avez généré pour votre compte, il est requis pour tout envoi vers API. Il est utilisé dans le corps de reqête sous le même nom.

`Requête de vérification du code`

`Le code`

Il s'agit du code à vérifier

`Le token de vérification`
Il s'agit du token récupéré lors de la génération

`Le téléphone`
Il représente le numéro de téléphone sur lequel la vérification a été effectué, il doit être suvi de son indicatif, ne doit contenir aucun espace et ne peut être NULL ou vide.

`Le token`
Il est question du token que vous avez généré pour votre compte, il est requis pour tout envoi vers API. Il est utilisé dans le corps de reqête sous le même nom.











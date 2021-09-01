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



REPONSES DU SERVEUR

Le serveur retourne deux catégories possible de réponse lors d'une rêquete. Nous avons les retours de type `ERROR` et les retours de type `SUCCESS`.
Les messages d'erreur
Les messages d'erreur sont sous le format:
`"error" : {
"message" : {
"nom de l'erreur" : "message d'erreur"
}
}`
OU
`"error" : {
"message" : "message d'erreur"
}`
OU
`"error" : {
"messages" : [
{
"nom_erreur" : "message d'erreur"
}
]
}`

Quelques réponses communes aux deux requêtes

`"error" : {
"message" : "Method Not Allowed"
}`
Cette erreur est retournée avec un code `405` lorsque la requete envoyée n'est pas de type `POST`
`"error" : {
"message" : "Crédit insuffisant"
}`
Cette erreur est retournée avec un code `403`lorsque le compte utilisateur ne dispose pas d'assez de crédit pour effectuer l'opération.
`"error" : {
"message" : {
"token" : "Le token est requis"
}
}`
Cette erreur est retournée avec un code `422` lorsque la valeur du token est vide ou `NULL`
`"error" : {
"message" : {
"token" : "token invalid"
}
}`
Cette erreur est retournée avec un code `401` lorsque la valeur du token envoyée ne correspond à aucun compte utilisateur du système.
`"error" : {
"messages" : [
{
"phone" : "Le numéro est requis"
}
]
}`
Cette erreur est retournée avec un code `422` lorsque la valeur du numero de telephone est vide ou NULL
`"error" : {
"messages" : {
"phone" : "Le numéro téléphonique xxxxx n'est pas un numéro valide "
}
}`
Cette erreur est retournée avec un code `422` lorsque le numero de telephone est incorrect
Requête de génération du code
`"error" : {
"messages" : [
{
"name" : "Veuillez fournir le nom du service"
}
]
}`
Cette erreur est retournée avec un code `422` lorsque la valeur du nom de service n'est pas fourni dans la requête
`"success" : {
"code" : "200"
"status" : "pending"
"token" : "VAxxxxxxxxx"
"expire_in" : "30"
}`
Cette réponse est retournée avec un code `200` en cas de réussite, le token ici retourner représente le token de vérification nécessaire pour la vérification du code.
Requête de vérification du code
`"error" : {
"messages" : [
{
"verification_token" : "Le token de vérification est requis"
}
]
}`
Cette erreur est retournée avec un code `422` lorsque le token de vérification est manquant dans la requête
`"error" : {
"messages" : [
{
"code" : "Le code est requis"
}
]
}`
Cette erreur est retournée avec un code `422` lorsque le code n'est pas renseigné dans la requête
`"error" : {
"message" : "Token de vérification expiré"
}`
Cette erreur est retournée avec un code 422 lorsque la durée d'expiration du token s'est écroulé requête
`"success" : {
"code" : "200"
"status" : "pending"
}`
Cette réponse est retournée avec un code `200 `en cas de réussite, un status pending signifie que le code est incorrect,
lorsqu'il a la valeur approved alors la vérification a réussit








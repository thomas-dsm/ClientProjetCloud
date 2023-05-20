# ClientProjetCloud

## Projet Cloud Licence Pro Web

Made By Thomas Da Silva Mendonca and Adrien Coudour

## Client Guzzle

### How to Install
````
composer install
````

## PerfectShoppingClient

### default value :
```
$account = "cl1";
$isbn = "9782070541270";
$quantity = 12;
```

### Scénario

1. Le client regarde les livres qui existent en base de données
2. Le client choisit de regarder si un livre est disponible en stock
3. Le client commande une quantité X de livre
4. Le client consulte sa liste de commande pour regarder si elle a bien été réalisé

## ShoppingClient

### default value :
```
$account = "cl1";
$isbn = "9782070541270";
$quantity = 12;
```

### Scénario

Test appel du Shopping Service

| Code | Method BookReq                      |
|------|-------------------------------------|
| 200  | There are X Book(s) : 9782070541270 |
| 404  | Book not found                      |
| 404  | Customer not found                  |

| Code | Method BuyReq                                       |
|------|-----------------------------------------------------|
| 200  | Order of X Book(s) (9782070541270) has been created |
| 404  | Book not found                                      |
| 404  | Customer not found                                  |
| 400  | Quantity can't be equals to zero                    |

## ClientBuy2Book

### default value : 
```
$account = "cl2";
$isbn = "9782070541270";
$quantity = 15;
$isbn2 = "9782070541271";
$quantity2 = 5;
```

### Scénario
1. Le client regarde les livres qui existent en base de données
2. Le client choisit de regarder si le livre (9782070541270) est disponible en stock
3. Le client choisit de regarder si le livre (9782070541271) est disponible en stock
4. Le client commande une quantité 15 de livre (9782070541270)
5. Le client commande une quantité 5 de livre (9782070541271)
6. Le client consulte sa liste de commande pour regarder si elle a bien été réalisé

## ClientBuyNegativeAmount

### default value : 
```
$account = "cl2";
$isbn = "9782070541270";
$quantity = -5;
```

### Scénario
1. Le client regarde les livres qui existent en base de données
2. Le client choisit de regarder si le livre (9782070541270) est disponible en stock
3. Le client commande une quantité -5 de livre (9782070541270)4
4. Erreur

## clientBuyOK

### default value : 
```
$account = "cl2";
$isbn = "9782070541271";
$quantity = 15;
```

### Scénario
1. Le client regarde les livres qui existent en base de données
2. Le client choisit de regarder si le livre (9782070541271) est disponible en stock
3. Le client commande une quantité 15 de livre (9782070541271)
4. Le client consulte sa liste de commande pour regarder si elle a bien été réalisé

## ClientBuyWrongISBN

### default value : 
```
$account = "cl2";
$isbn = "9782070541279";
$quantity = 15;
```

### Scénario
1. Le client choisit de regarder si le livre (9782070541279) qui n'existe pas
2. Erreur

## ClientWrongIdentifiant

### default value : 
```
$account = "cl3";
$isbn = "9782070541271";
$quantity = 15;
```

### Scénario
1. Un client qui n'existe pas choisit de regarder si le livre (9782070541270) est disponible en stock
2. Erreur car le client n'existe pas

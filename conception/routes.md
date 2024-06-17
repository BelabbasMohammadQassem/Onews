# routes

## Front

| URL | VERB | Controller | action | comments |
|---|---|---|---|---|
| `/` | `GET` | `TripController` | `browse` | list all trips |
| `/trip/{id}` | `GET` | `TripController` | `read` | Show one trip |
| `/trip/{id}/comment` | `GET`, `POST` | `TripController` | `addComment` | display and process add comment form |

## Back

| URL | VERB | Controller | action | comments |
|---|---|---|---|---|
| `/back/trip/` | `GET` | `TripController` | `browse` | list all trips |
| `/back/trip/{id}` | `GET` | `TripController` | `read` | show one trip |
| `/back/trip/{id}/edit` | `GET`, `POST` | `TripController` | `edit` | display and process the edit trip form |
| `/back/trip/add` | `GET`, `POST` | `TripController` | `add` | display and process the add trip form  |
| `/back/trip/{id}/delete` | `GET` | `TripController` | `delete` | delete one trip and its comments |

## API

| URL | VERB | Controller | action | comments |
|---|---|---|---|---|
| `/api/v1/trip` | `GET` | `TripController` | `browse` | list all trips |
| `/api/v1/trip/{id}` | `GET` | `TripController` | `read` | show one trip |
| `/api/v1/trip/{id}` | `PUT` | `TripController` | `edit` | update a trip |
| `/api/v1/trip` | `POST` | `TripController` | `add` | add a trip  |
| `/api/v1/trip/{id}` | `DELETE` | `TripController` | `delete` | delete one trip and its comments |
| `/api/v1/country` | `GET` | `CountryController` | `browse` | list all countries |
| `/api/v1/country/{id}` | `GET` | `CountryController` | `read` | show one trip |
| `/api/v1/country` | `POST` | `CountryController` | `add` | add a country  |

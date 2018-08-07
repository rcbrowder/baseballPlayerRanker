# PlayerRanker Requirements

## Tech

1. HTML
2. CSS
3. JavaScript
4. Laravel PHP Framework
5. PostgreSQL
6. Heroku

## Wireframe

See [InitialWireframe]('docs/InitialWireframe.png').

## Minimum Viable Product

### Home page

1. Title
2. Description
3. Two buttons
    * One directs you to page with batter stats
    * Other directs you to page with pitcher stats
4. Login/Register buttons

### Stats page

1. Button to switch you from batter stats page to pitcher stats page and vice versa
2. Category selector field
    * Categories must be selectable and de-selectable
    * Button to refresh results after category selection has changed
3. Results section
    * Displays results in easy to read format
        * Player name
        * Position
        * Selected stats with z-score
        * Overall z-score
4. Login/Register buttons

### Backend

1. Username and password for each user
2. Saved state of selected categories for batters and pitchers

##### API

1. Get data from API on refresh
2. Manipulate data *(will I need to add to database to do this???)*

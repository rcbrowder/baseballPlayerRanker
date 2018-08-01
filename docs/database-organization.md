
* Want to run request once a day and store results. How can I accomplish this?
    * Cron job
        * Research if they'll work in Heroku
    * Laravel queues


4 tables
    - Users
        - ID
        - Name
        - Email
        - Password
        - Stats string
    - Players
        - ID
        - Name
        - Position
    - Stats
        - Category
    - Z-score table
        - Player_ID  -- Composite index?
        - Stats_ID
        - Z-score

CREATE TABLE sectors (
    sector_id SERIAL PRIMARY KEY,
    title VARCHAR(100) -- if parent_id is null, display in nav links
    parent_id INTEGER,
);

---------------------- 
-- MEAL PLANNER
----------------------
CREATE TABLE grub_recipes (
    recipe_id SERIAL PRIMARY KEY,
    title VARCHAR(255),
    directions VARCHAR(1000),
    difficulty TINYINT, -- subjective 1-10 scale of difficulty (10 = quite hard)
    preptime INTEGER -- minutes
);

CREATE TABLE grub_ingredients (
    recipe_id INTEGER, -- FK recipes
    food_id INTEGER, -- FK food
    note VARCHAR(255),
    qty FLOAT,
    qty_type_id INTEGER -- FK  
);

CREATE TABLE grub_food (
    food_id SERIAL PRIMARY KEY,
    title VARCHAR(255),
    default_qty FLOAT, -- default
    default_gty_type_id INTEGER
);

---------------------- 
-- SCHEDULER
----------------------
CREATE TABLE schedule (){
    -- Hmm.... maybe want to create a more generic scheduler for all notifications, etc.
    -- scheduling meals
    -- scheduling arduino events.... 
}
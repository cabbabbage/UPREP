# U-Prep

U-Prep is a web application I developed for use in a professional kitchen. The goal of the app is to be an all-in-one utility to assist management and porter chefs with food prep and material tracking. Here is a brief overview of each of the services:

### Start Prep
This service assists users with the actual prep process by telling the user what, how much, and in what order to prep food items. The user is presented with a table of food items that need to be prepped in order from most needed to least needed. I used PHP to load "master_prep.csv" from the server and then used JavaScript to generate the table based on its data. From the table, a chef can click an item's cell, which loads a recipe page for that item. The selected recipe will have adjusted ingredient portions required to meet the yield specified in "target_prep.csv". When a recipe is complete, the chef enters the yield, which is written to "usage.csv" and "master_prep.csv" is updated.

[See this service](https://www.cs.colostate.edu/~rollo/U-Prep/prep/prep.html)

### Make Prep List
This service allows a chef to generate the aforementioned prep list. To do this, a user simply clicks "Start Prep" and the process begins. For each item in "target_prep.csv", the application will load a modal with the name of that item, which the chef needs to find and report the remaining value of. The remaining amount of an item will be updated in "master_prep.csv" for the corresponding item. The difference between the "amount_needed" cell of the item's line in "target_prep.csv" and the reported amount is the amount that needs to be prepped. After every item has been reported, items with the greatest difference between the target amount and actual amount are of higher prep priority and will be placed higher on the "master_prep.csv". Each time a new prep list is made, it will report the date completed and who completed it at the top of the "Start Prep" page.

[See this service](https://www.cs.colostate.edu/~rollo/U-Prep/prep_list/prep_lists.php)

### Freezer Pull
Freezer Pull is very similar to "Make Prep List". Instead of reporting on the remaining value of items and calculating an amount to be prepped, the chef will report the remaining amount of thawed items and calculate the amount of frozen items that need to be pulled from the freezer and put in the fridge to be used later. As this process is simple and short, the user is not provided with a CSV at the end but is expected to pull the needed items as they make their way down the list. Instead of "target_prep.csv", this service uses data from "target_pull.csv".

[See this service](https://www.cs.colostate.edu/~rollo/U-Prep/freezer_pull/prep_list.html)

### Manager Settings (needs implementation)
This section allows a manager to upload/edit CSVs "master_prep.csv", "target_prep.csv", and "target_pull.csv", as well as add, delete, and change recipes and food items. This section would also be used for accessing usage, waste, and prep logs to make decisions on how much to prep and when, as well as see how much each individual porter is producing.

[See this service](XXXXXX)

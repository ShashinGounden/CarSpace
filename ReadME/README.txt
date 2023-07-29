##############################################################################################################
1. How to use the website:
->Navigate to www.wheatley.cs.up.ac.za/u21458686/
->You will be presented with an index page to pick which Practical you would like to view
->You are then redirected to the home page, "Cars". A user can search for a car model, filter it according to the fuel type and engine type by selecting it through the drop down menu. The user can also sort the results by clicking the checkboxes underneath the search bar. The user will search by clicking the search button.
->The user can navigate to the Brands page to view the brands on the website, the pictures and text.
->The user can navigate to the Find a Car page to find a car based on the specific criteria. The results will be shown in the search results area.
->The user can compare two or more cars together on the Compare page. They search for the model and click the search icon, which generates a table of the car with the relevant specs which can be compared to another car.
->The user can create an account on the Register page, they need to provide a valid name,surname,email and password. They can then login once they have succesfully registered. They can logout by clicking the logout tab in the nav bar when they are done using the website.

##############################################################################################################

2. Default login details for a user on API:
The create account and login system has been fully implemented already. Hence the user can create an account by clicking the sign up tab in the navigation bar. After they succesfully register, they can go to the login page to login with their details. The user will then be signed in and the session varibales will be set accordingly. THe navigation bar then also removes the sign up and log in tab and replaces it with a logout tab.
An account with a username: admin@admin.com and password: Admin123! can be used to login as a default account

##############################################################################################################

3. All functionality from Practical 3 has been implemented.

##############################################################################################################

4. Explanations:

##############################################################################################################
4.1)Task 2: Why it is important to have the specific password requirements and also check that all fields are valid on the client-side?

It is important for the password to be longer than 8 characters, contain upper and lower case letters, at least one digit and one symbol, because it prevents security vulnerabilities within the system. It prevents accounts from being hacked by simple methods like brute-force attacks because having those password requirements adds complexity to the passwords, making it less likely that it can be hacked. Using the rules of a password containing uppercase and lowercase letters, digits, and symbols to a password increases the number of possible combinations, which makes it more difficult to guess. Hence it promotes accounts security to use those rules to create a strong password. The use of the strong password to protect your account hence prevents unauthorized access, keeping your sensitive personal information safe. Since the password is more complex with those rules in place, your information protected  will be from cyber threats and hackers.

It is important to do client-side validation to maintain the data integrity of what is stored in your database, and also to prevent invalid data from being posted to the relevant place. By doing the validation before the form is submitted to the server-side, we ensure that the data matches an acceptable format and prevent the user from also making a mistake in their details when creating an account. Since errors are caught before posting, it can prevent unnecessary requests to the server. It is important to then validate on the server-side as it may be bypassed by an attacker and thus it must be checked once the data is received to make sure that it is still valid and hasn't been intercepted. 

##############################################################################################################

4.2)Task 2: Why my choice of a hashing algorithm was SHA256?
Firstly, a secret "Salt" string is created by concatenating the users email with the salt. The users email will always be unique as it is a unique field. This means we combine a secret key to a different email everytime an account is created, making it dynamic. We then add that unique salt string to the plain-text password, for more security, before it is encrypted using the SHA256 algorithm. SHA256 was picked because it produces a 256-bit hash value, which means there are 2^256 possible hash values. This makes it very effective against collision attacks and brute force attacks. SHA-256 is a a one-way hashing function, so it's extremely difficult to reverse engineer the original data from the hash value. This makes it a secure way to store users passwords. In addition to that main reason, it is also fast to compute which makes the process of hashing fast, and widely used which means that it has been tested thoroughly and deemed an appropriate hashing method for sensitive information. 

##############################################################################################################

4.3)Task 2: How my API key is generated for a user that successfully registers?
TO generate the API key for a user that is succesfully registered, we add a secret salt string to their email, which is unique, to create a unique string. This makes it dynamic. We then use md5 to hash that dynamic string, since md5 always returns a hashed string that is 32 characters long. This means that every user will have an API-kye that is 32 characters long and unique to them. Since we apply the md5 hashing algorithm to a different, dynamic string each time, eahc user will have a unique API-Key. 

##############################################################################################################





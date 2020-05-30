INSTRUCTIONS

A. Local host version
- The index page of assignment 5 is redirect to url "/home". Therefore, it must be accessed by localhost:{port}/{root}/home
- All the pages for system edits can only be accessed by admin users.
- To create an admin user, a user must be created first via /sign-in page. After that an admin must be created in "admins" table with the "user_id" of the admin user.
- SQL files to create the database and populate important tables are provided in folder "sql"

B. Deployed version (Real Website)
- URL : https://glacial-hollows-95582.herokuapp.com
- Admin account:
    + email: hienhydra11@gmail.com
    + password: 123456

*Note: 
- Once you have signed in, the "sign in" symbol in nav bar will be replaced by your name. If you are an admin, it will show "Edit System" and let u do CRUD operations on Categories, Products and Users.
- The product requires MAMP 4.x.x or  MAMP 5.x.x, along with php 7.4.x (localhost tested version)
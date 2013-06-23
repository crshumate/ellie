Ellie<sup>&#0169;</sup> 
======================
- a Twitter Bootstrap cakePHP CMS for writing source based blog posts

Welcome to Ellie (preAlpha version 1), a cakePHP based CMS for writing blog posts that have sources. The main meat of Ellie is mostly done however there are many outstanding and important items. 

1. Need a Site controller/view so user can dynamically update various site settings without accessing database.
ie: site name, footer text

2. Need to create an install script so anyone can simply download Ellie and run it in the browser (Install Steps below)
	* The install script should:
		1. Set up DB Credentials
		1. Create admin user/pw
		1. Set site name and any other settings
		1. Auto generate random salt and cipherSeed values


3. Need to revamp Search functionality so the words are indexed rather than running MySQL LIKE statements on all Post content

4. Misc links in right sidebar need to be dynamic and updated in db, also tied to specific page/post, or else removed entirely - not sure yet.

5. Add password recovery logic

6. Currently the app is built/meant for one user. Possibly change this to multiuser. 


Install Steps
---------------
1. Clone the project
2. Under app/Config change database.default.php to datbase.php and insert your db credentials
3. Under app/Config change core.default.php to core.php and change your salt and ciperSeed values
4. In the project root import schema.sql. This will:
	* Create a default site in the sites table.
	* Create a sample category/post/page 
	* No user is created since you are updating the salt value. You need to visit /users/add in your browser and generate a new user. At this point you need to update the id of the user to 1 in the db (if it isn't already). 


NOTES: When writing content, to generate a source it must be formatted thusly:
[Source Name]::[Source Url] [hard return]

So if I wanted Google and AOL to be on my source list for an article: (each source is separated by a hard return) 

Google::http://google.com
AOl::http:aol.com


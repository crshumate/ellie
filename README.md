Ellie
======================
\- a Twitter Bootstrap cakePHP CMS for writing source based blog posts

Welcome to Ellie (preAlpha version 1), a cakePHP based CMS for writing blog posts that have sources. The main meat of Ellie is mostly done however there are many outstanding and important items. 

Todos:
-----

1. Need to create an install script so anyone can simply download Ellie and run it in the browser (Install Steps below)
	* The install script should:
		1. Set up DB Credentials
		1. Create admin user/pw
		1. Set site name and any other settings
		1. Auto generate random salt and cipherSeed values
		1. Need to create app/tmp/cache/persistent && models directories w/ perms set to 755
		


1. Need to revamp Search functionality so the words are indexed rather than running MySQL LIKE statements on all Post content

1. Misc links in right sidebar need to be dynamic and updated in db, also tied to specific page/post, or else removed entirely - not sure yet.

1. Add password recovery logic

1. Currently the app is built/meant for one user. Possibly change this to multiuser. 

1. Run through backend/front end form validation and make sure it is set up

Debug:
------

1. Meta title: Consistent spacing between colon and text 
1. Delete button visible even if there are no images on post/page pages  - create/edit 

Install Steps
---------------
1. Clone the project
2. Under app/Config change database.default.php to datbase.php and insert your db credentials
3. Under app/Config change core.default.php to core.php and change your salt and ciperSeed values
4. In your MySQL database import schema.sql (located in project root) This will:
	* Create a default site in the sites table.
	* Create a sample category/post/page 
	* No user is created since you are updating the salt value. You need to visit /users/add in your browser and generate a new user. At this point you need to update the id of the user to 1 in the db (if it isn't already). 


NOTES
-------
<h3>Sources</h3>
When writing content, to generate a source it must be formatted thusly:
[Source Name]::[Source Url] [hard return]

So if I wanted Google and AOL to be on my source list for an article: (each source is separated by a hard return) 

Google::http://google.com <br />
AOl::http://aol.com

<h3>Images</h3>
This CMS also has image upload support. 
To insert an image click on the upload button and upload an image as normal. Then once uploaded click on the image link to have it inserted at the end of your content.




# Bizcloud QWIKI
Bizcloud Qwiki is a simple application that allows Google Docs to be used to present a collection of these as an online user manual or documentation. The user guide serves as a [demo](https://bizverse.biz/qwiki).

The Qwiki is intended for use with a Bizcloud host in which the Qwiki bundle template is construted. The bundle template may then be installed to the server as a set of JSON files. The Qwiki application interprets the JSON instructions and renders the Google docs or other pages as needed.

Simply use Google Docs to create the different parts of your user manuals and then expose these to your users using Qwiki.

Only users that have been granted permission to edit the underlying Google Docs document, will be able to do so from the like available on the ‘edit’ link in the right side bar menu.

For documents to be viewable publicly, the linked Google Docs document must be shared using Publish to the Web.

This set of files should be copied into a folder, e.g. with the name or 'manual' or 'documentation'.

Access the sample manual by using, e.g. https://yourdomain.com/manual.

[User Guide](https://bizverse.biz/qwiki)

## QUICK INSTALLATION INSTRUCTIONS

Copy the folder contents into a bundle container. The bundle container is a folder at the root of the web site.

In the qwiki.ini.php file, set the workspace ID (ws), template ID (id) and token as in the Qwiki/Quickdoc template.

Run the install.php from the browser (e.g. yourdomain.co/your-folder/install.php).

Access the book bundle using the url e.g. yourdomain.co/your-folder.



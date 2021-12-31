# Course Unit Reviews

This website gives students in the University of Manchester's Computer Science
Department to share reviews of their experiences on course units. Hopefully,
this will help future students to make a more informed decision about which
course units they should choose.

Please note that this website requires services which are only available on
campus or through use of the GlobalProtect VPN.

### Installation

1. Begin by cloning the repository and entering its directory:

```
git clone ssh://gitlab@gitlab.cs.man.ac.uk:22222/f77885sh/course-unit-reviews.git
cd course-unit-reviews
```

2. Clone the config file and change the values (the values you should use are
available at https://web.cs.manchester.ac.uk/dashboard/manage):

```
cp sample-config.inc.php config.inc.php
nano config.inc.php
```

3. Create a symbolic link to your local web server:

```
sudo ln -s  /home/csimage/git/course-unit-reviews /var/www/html
```

(This assumes you're using the CSImage Virtual Machine and cloning to your `git`
directory. You may need to change this command if you're doing something
different).

4. Connect to the VPN:

```
globalprotect connect
```

For additional support with the VPN, see [this article](https://wiki.cs.manchester.ac.uk/index.php/VPN_For_Taught_UG_and_PG_students#Setting_up_the_VPN_in_the_CS_Image).

5. Navigate to `http://localhost/course-unit-reviews` in your web browser.

### Contributing

Thank you for your interest! Please take a look at:

- [The Code of Conduct](https://gitlab.cs.man.ac.uk/f77885sh/course-unit-reviews/blob/main/.gitlab/CODE_OF_CONDUCT.md).
- [The Contributing Guide](https://gitlab.cs.man.ac.uk/f77885sh/course-unit-reviews/blob/main/.gitlab/CONTRIBUTING.md).

### License

[MIT](https://gitlab.cs.man.ac.uk/f77885sh/course-unit-reviews/blob/main/LICENSE)
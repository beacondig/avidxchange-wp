# avidxchange site

This is the documentation that should get you through the setup and deployment
Please note that this is a work in progress and will be actively updated to better automate the process
## Getting Started

If this is the first time you are working locally with this site, please download a backup from wpengine.  Remove the active theme from the the backup and. Make sure to keep the uploads folder as that is not in sync with github.   Then, clone this repo and place with the themes folder add the uploads folder that you saved to the theme.  
Retrieve the mysql file an import into your local setup

### Prerequisites

you will need to install node.js



### Installing

open your command line tool of choice and navigate to avidxchange theme folder

From here, type

```
npm install
```

this will install all of the dependencies for the workflow.  once this is done, type

```
gulp watch
```

this will watch the js and scss files and build them for release


## To Dos below

### Create local config file
will add a local config sample file for developer to use on local instance
### update gulp workflow
Presently, only scss is being watched.  will update this to include images, fonts, and js.  

### Including to ci automation
#### add circle ci into the employing below process
    Once you are satisfied with your local version of the feature, you will push it to the develop branch of git.  This will trigger a continuous integration process using circle ci.  It run tests on the code, and if it passes, will deploy to [the development site]()

    After the development branch has been QA'd, you will create a branch title `release\today's date` and push it to github.  
    Again, this will trigger the CI.  it will deploy to the [staging enviroment](http://opusstaging.wpengine.com/)

    Once all is approved, you will merge the release with master triggering the last CI deployment to the production site
#### Include a regression test via [percy.io](https://percy.io)
#### Create ACF json file
Reference [this](https://www.awesomeacf.com/how-to-avoid-conflicts-when-using-the-acf-local-json-feature/)  to update to ensure no conflicts occur 
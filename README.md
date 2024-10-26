
# WMSUPayNet
=======
#1 - Git branch and merge
pre-req:
	install git on your dev
	create GitHub account
	install GitHub desktop
1. Create a repo of your project with readme
2. Add all of your members as collaborator
3. create a personal branch for every member of the team using the format firstname-lastname
4. clone and checkout your branch
5. in your project, create an html page using your name as file name and display a text <your name>
6. commit and push your changes to your personal branch only
7. merge your personal branch into the main/master branch - pull request if needed, to be approved by the repo creator
8. do step 7 for all branches
9. pull the changes from main to your personal branch, merge and rebase if needed
10. double check if the code changes applied to the other branches are now reflected in your personal branch - git checkout
11. check commit history, the number of commits is at least equal to the number of pull request made
12. create a hot fix branch from the 2 commits made in the main branch, if you have 5 commits, only the 1st-two branch/commit is present in this version
13. checkout your personal branch then always pull from main, this is to ensure your branch is updated
14. create an index page (all branches will create the same page) - add one line h1 … h6
15. repeat step 7 to step 10, you should experience now a merge conflict, fix the merge manually - do not always accept changes
 example
	member 1 committed h1 into index
	member 2 committed h2 into index
	member 3 committed h1 h3 into index
when you merge this, the index should have both h1, h2, and h3.
16. End of activity



# Onboarding Process
1. Coordinator upload student list then we assign bracket ids and inform students
2. Students leader fill the google form or a form provided by our system.. that student select two bracket ids and select the leader id and add any project title or description.
3. we will update the group details according to it.
4. The coordinator will upload supervisor data
5. Then students can request supervisors.


# Task Creation Process
1. First we should have a short code for each group
2. When tasks created they have a unique auto incrementing id.. but it's only for db. We display a created id like MM-1 MM-2 based on the group.
3. When creating a task we have something called relative group id and relative student id columns. in them we store incrementing value that indicates relative id of the task. (We don't need the user relativity for now just need the group relativity. it's just for the convince of the user but for db operations we use the task_id)
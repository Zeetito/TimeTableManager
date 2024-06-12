### TIME TABLE
What goes into the time table.

## First Consider
- ClassGroupCourse instances.

Based on the Number of Classgroups (with their sizes) offering a particular course,
The time table is created factoring the size of the class and the capacity of the classrooms.

<!-- PROCEDURE 1? -->
<!-- ## Time Table Creation.
1. Foreach ClassGroup, You need ;Total Credit Hours for the Sem, Number of Courses for the sem,

2. Check for the number of students who offer the same course.

3. Check for a classroom in the department/College of the related course that can accomodate all the number of students

4. If found, Choose that as the Classroom else, boraden the scope for any classroom that can accomodate the people.

5. If found check a time the Classgroup is available within the day.


6. if found assign the time date and classroom.

7. Some courses may be of 3 Credit hours. First assign the 2 hours and the 1 hour on another day.

## Second Phase for the Creation.
1. Foreach ClassGroup, You need ;Total Credit Hours for the Sem, Number of Courses for the sem, -->


<!-- PROCEDURE 2? -->
1. Foreach Course, Check if it has classgroups taking the course for that particular sem.

2. Get the number of students & Classgroups who take the course

3. Get a classroom in the related department (for the course) that can accomodate all the number of students.

4. If no such class exists? Get any from related departments of the colleges of the related classgroups

5. If no such exists, any classroom at all that can accomodate the class should be picked.

6. The availability of a capable class is coupled with checking for what time (start_time) it's free and what day as well and also, considering the lecturer and what time he's free.

6. A Time Table is created(if does not exist) or updated(if exists) for the related classgroups for that sem.

7. If the credit hour of the course is greater than 2, only 2 is used and 1 is stripped of (in the meantime)

8. A new TimetableCourse instance is created with the [timetable_id, course_id, day, classroom_id start_time, end_time and the lecturer_id]





### NEEDED FUNCTIONS OR RELATIONSHIPS
## CLASSROOMS
- Check if a classroom can accomodate and array of ClassGroups parsed.
- Check if a class is free at a particular time
- Return times where a class is free for a particular period (day);
- 

## ClASSGROUP
- Check if a classgroup is free at a particular point in time
    Using the ClassCourseLecturesinstances.
- 

## LECTURER
- Check what time and day he's free.

## COMBINED FUNCTIONS
- Check for a day that an array of classgroups are free at a particular point in time.


## TIME TABLE CONTROLLER

### LECTURE

## Table Attributes
- id
- course_id
- lecturer_id
- is_tutorial
- semester_id
- start_time
- end_time
- classroom_id
- status [1:Not_yet, 2:over, 3:cancelled]
- timestamps

RELATIONSHIPS
attendees(): all students required to attend
classes(): all classes required to partake of this lecture
lecturer(): lecturer to handle the Lecture


FUNCTIONS
is_over(): Ceck if the end_time of a lecture is past.
in_session(): Check if a lecture is in session.

STATIC FUNCTIONS
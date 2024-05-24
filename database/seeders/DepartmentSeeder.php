<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            // COLLEGE OF AGRICULTURE
            // FACULTY OF AGRICULTURE
            ['name' => 'Department of Animal Science', 'college_id' => 1, 'faculty_id' => 1],
            ['name' => 'Department of Agricultural Economics, Agribusiness and Extension', 'college_id' => 1, 'faculty_id' => 1],
            ['name' => 'Department of Crop and Soil Sciences', 'college_id' => 1, 'faculty_id' => 1],
            ['name' => 'Department of Horticulture', 'college_id' => 1, 'faculty_id' => 1],
            // FACULTY OF RENEWABLE NATURAL RESOURCES
            ['name' => 'Department of Wildlife and Range Management', 'college_id' => 1, 'faculty_id' => 2],
            ['name' => 'Department of Silviculture and Forest Management', 'college_id' => 1, 'faculty_id' => 2],
            ['name' => 'Department of Agroforestry', 'college_id' => 1, 'faculty_id' => 2],
            ['name' => 'Department of Wood Science and Technology Management', 'college_id' => 1, 'faculty_id' => 2],
            ['name' => 'Department of Fisheries and Watershed Management', 'college_id' => 1, 'faculty_id' => 2],
            // COLLEGE OF ART AND BUILT ENVIRONMENT
            // FACULTY OF BUILT ENVIRONMENT
            ['name' => 'Department of Architecture', 'college_id' => 4, 'faculty_id' => 3],
            ['name' => 'Department of Construction Technology and Management', 'college_id' => 4, 'faculty_id' => 3],
            ['name' => 'Department of Planning', 'college_id' => 4, 'faculty_id' => 3],
            ['name' => 'Department of Land Economy ', 'college_id' => 4, 'faculty_id' => 3],
            // FACULTY OF ART
            ['name' => 'Department of Painting and Sculpture', 'college_id' => 4, 'faculty_id' => 4],
            ['name' => 'Department of Industrial Art', 'college_id' => 4, 'faculty_id' => 4],
            ['name' => 'Department of Indigenous Art and Technology', 'college_id' => 4, 'faculty_id' => 4],
            ['name' => 'Department of Publishing Studies', 'college_id' => 4, 'faculty_id' => 4],
            ['name' => 'Department of Communication Design', 'college_id' => 4, 'faculty_id' => 4],
            // FACULTY OF EDUCATIONAL STUDIES
            ['name' => 'Department of Educational Innovations in Science and Technology', 'college_id' => 4, 'faculty_id' => 5],
            ['name' => 'Department of Teacher Education', 'college_id' => 4, 'faculty_id' => 5],
            ['name' => 'SANDWICH PROGRAMMES (TO BE RUN ONLINE AND FACETO-FACE DURING GES VACATION)', 'college_id' => 4, 'faculty_id' => 5],
            // COLLEGE OF ENGINEERING
            // FACULTY OF CIVIL AND GEO-ENGENEERING
            ['name' => 'Department of Civil Engineering', 'college_id' => 3, 'faculty_id' => 6],
            ['name' => 'Department of Geomatic Engineering', 'college_id' => 3, 'faculty_id' => 6],
            ['name' => 'Department of Petroleum Engineering', 'college_id' => 3, 'faculty_id' => 6],
            ['name' => 'Department of Geological Engineering', 'college_id' => 3, 'faculty_id' => 6],
            // FACULTY OF ELECTRICAL & COMPUTER ENGINEERING
            ['name' => 'Department of Electrical and Electronic Engineering', 'college_id' => 3, 'faculty_id' => 7],
            ['name' => 'Department of Computer Engineering', 'college_id' => 3, 'faculty_id' => 7],
            ['name' => 'Department of Telecommunication Engineering ', 'college_id' => 3, 'faculty_id' => 7],
            // FACULTY OF MECHANICAL & CHEMICAL ENGINEERING
            ['name' => 'Department of Chemical Engineering', 'college_id' => 3, 'faculty_id' => 8],
            ['name' => 'Department of Agricultural and Biosystems Engineering', 'college_id' => 3, 'faculty_id' => 8],
            ['name' => 'Department of Mechanical Engineering', 'college_id' => 3, 'faculty_id' => 8],
            ['name' => 'Department of Materials Engineering', 'college_id' => 3, 'faculty_id' => 8],
            // COLLEGE OF HEALTH SCIENCES
            // FACULTY OF PHARMACY AND PHARMACEUTICAL SCIENCES
            ['name' => 'Department of Pharmaceutics', 'college_id' => 6, 'faculty_id' => 9],
            ['name' => 'Department of Pharmacognosy', 'college_id' => 6, 'faculty_id' => 9],
            ['name' => 'Department of Pharmaceutical Chemistry', 'college_id' => 6, 'faculty_id' => 9],
            ['name' => 'Department of Pharmacy Practice', 'college_id' => 6, 'faculty_id' => 9],
            // FACULTY OF ALLIED HEALTH SCIENCES
            ['name' => 'Department of Nursing', 'college_id' => 6, 'faculty_id' => 10],
            ['name' => 'Department of Physiotherapy and Sports Science', 'college_id' => 6, 'faculty_id' => 10],
            ['name' => 'Department of Medical Diagnostics', 'college_id' => 6, 'faculty_id' => 10],
            // SCHOOL OF MEDICINE AND DENTISTRY
            ['name' => 'Department of Molecular Medicine', 'college_id' => 6, 'faculty_id' => 11],
            ['name' => 'Department of Clinical Microbiology', 'college_id' => 6, 'faculty_id' => 11],
            ['name' => 'Department of Anatomy', 'college_id' => 6, 'faculty_id' => 11],
            ['name' => 'Department of Physiology', 'college_id' => 6, 'faculty_id' => 11],
            ['name' => 'School of Veterinary Medicine', 'college_id' => 6, 'faculty_id' => 11],
            // SCHOOL OF PUBLIC HEALTH
            ['name' => 'Department of Health Education, Promotion and Disability Studies', 'college_id' => 6, 'faculty_id' => 12],
            ['name' => 'Department of Population, Family and Reproductive Health', 'college_id' => 6, 'faculty_id' => 12],
            ['name' => 'Department of Occupational and Environmental Health and Safety', 'college_id' => 6, 'faculty_id' => 12],
            ['name' => 'Department of Health Policy, Management and Economics', 'college_id' => 6, 'faculty_id' => 12],
            ['name' => 'Department of Epidemiology and Biostatistics', 'college_id' => 6, 'faculty_id' => 12],
            ['name' => 'Department of Global and International Health', 'college_id' => 6, 'faculty_id' => 12],
            // COLLEGE OF HUMANITIES AND SOCIAL SCIENCES
            // FACULTY OF LAW

            // FACULTY OF SOCIAL SCIENCES
            ['name' => 'Department of Economics', 'college_id' => 2, 'faculty_id' => 14],
            ['name' => 'Department of Language and Communication Sciences', 'college_id' => 2, 'faculty_id' => 14],
            ['name' => 'Department of Geography and Rural Development', 'college_id' => 2, 'faculty_id' => 14],
            ['name' => 'Department of Religious Studies', 'college_id' => 2, 'faculty_id' => 14],
            ['name' => 'Department of Sociology and Social Work', 'college_id' => 2, 'faculty_id' => 14],
            ['name' => 'Department of History and Political Studies', 'college_id' => 2, 'faculty_id' => 14],
            ['name' => 'KNUST SCHOOL OF BUSINESS (KSB)', 'college_id' => 2, 'faculty_id' => 14],
            // COLLEGE OF SCIENCE
            // FACULTY OF BIOSCIENCES
            ['name' => 'Department of Biochemistry and Biotechnology', 'college_id' => 5, 'faculty_id' => 15],
            ['name' => 'Department of Food Science and Technology', 'college_id' => 5, 'faculty_id' => 15],
            ['name' => 'Department of Environmental Science', 'college_id' => 5, 'faculty_id' => 15],
            ['name' => 'Department of Theoretical and Applied Biology', 'college_id' => 5, 'faculty_id' => 15],
            ['name' => 'Department of Optometry and Visual Science', 'college_id' => 5, 'faculty_id' => 15],
            // FACULTY OF PHYSICAL & COMPUTATIONAL SCIENCES
            ['name' => 'Department of Chemistry', 'college_id' => 5, 'faculty_id' => 16],
            ['name' => 'Department of Physics', 'college_id' => 5, 'faculty_id' => 16],
            ['name' => 'Department of Meteorology and Climate Science', 'college_id' => 5, 'faculty_id' => 16],
            ['name' => 'Department of Mathematics', 'college_id' => 5, 'faculty_id' => 16],
            ['name' => 'Department of Statistics and Actuarial Science', 'college_id' => 5, 'faculty_id' => 16],
            ['name' => 'Department of Computer Science', 'college_id' => 5, 'faculty_id' => 16],
            ['name' => 'INSTITUTE OF DISTANCE LEARNING', 'college_id' => 5, 'faculty_id' => 16],

        ];

        foreach ($departments as $department) {
            Department::create($department);
        }

    }
    
}

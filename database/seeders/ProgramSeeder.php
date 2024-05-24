<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            //  COLLEGE OF AGRICULTURE AND NATURAL RESOURCES
            // FACULTY OF AGRICULTURE 1

            //  Programs without Departments in this Faculty
            ['name' => '101 BSc. Agriculture', 'department_id' => null, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'ug', 'span'=>4],
            ['name' => '880 BSc. Agricultural Biotechnology', 'department_id' => null, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'ug', 'span'=>4],
            ['name' => '886 BSc. Agribusiness Management', 'department_id' => null, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'ug', 'span'=>4],
            ['name' => '879 BSc. Landscape Design and Management', 'department_id' => null, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'ug', 'span'=>4],

            // Department of Animal Science 1
            ['name' => 'MPhil. Animal Breeding and Genetics', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Reproductive Physiology', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Animal Nutrition', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Meat Science', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Animal Breeding and Genetics', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Reproductive Physiology', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Animal Nutrition', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Meat Science', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Agricultural Extension and Development Communication', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Agribusiness Management', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Agricultural Extension and Development Communication', 'department_id' => 1, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],

            // Department of Agricultural Economics, Agribusiness and Extension 2
            ['name' => 'MSc. Agribusiness Management', 'department_id' => 2, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Agricultural Extension and Development Communication', 'department_id' => 2, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Agribusiness Management', 'department_id' => 2, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Agricultural Economics', 'department_id' => 2, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Agricultural Extension and Development Communication', 'department_id' => 2, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Agribusiness Management', 'department_id' => 2, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Agricultural Extension and Development Communication', 'department_id' => 2, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Agricultural economics', 'department_id' => 2, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],

            // Department of Crop and Soil Sciences 3
            ['name' => 'MPhil. Agronomy', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Agronomy (Crop Physiology)', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Crop Protection (Entomology)', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Crop Protection (Nematology)', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Crop Protection (Plant Pathology)', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Crop Protection (Plant Virology)', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Plant Breeding', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Soil Science', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Agronomy', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Crop Physiology', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Nematology', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Plant Breeding', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Plant Entomology', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Plant Pathology', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Plant Virology', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Soil Science', 'department_id' => 3, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],

            // Department of Horticulture 4
            ['name' => 'MPhil. Postharvest Technology', 'department_id' => 4, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Seed Science and Technology', 'department_id' => 4, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Fruit Crops Production', 'department_id' => 4, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Vegetable Crops Production', 'department_id' => 4, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Landscape Studies', 'department_id' => 4, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Postharvest Technology', 'department_id' => 4, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Seed Science and Technology', 'department_id' => 4, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Fruit Crops Production', 'department_id' => 4, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Landscape Studies', 'department_id' => 4, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Vegetable Crops Production', 'department_id' => 4, 'faculty_id' => 1, 'college_id' => 1, 'type' => 'pg', 'span'=>4],

            // FACULTY OF RENEWABLE NATURAL RESOURCES  2
            //      Programs without Department in this faculty
            ['name' => '108 BSc. Natural Resource Management', 'department_id' => null, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'ug', 'span'=>4],
            ['name' => '735 BSc. Forest Resources Technology', 'department_id' => null, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'ug', 'span'=>4],
            ['name' => '741 BSc. Packaging Technology', 'department_id' => null, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'ug', 'span'=>4],
            ['name' => '1045 BSc. Aquaculture and Water Resource Management', 'department_id' => null, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'ug', 'span'=>4],

            //  Department of Wildlife and Range Management  5
            ['name' => 'MPhil. Wildlife and Range Management', 'department_id' => 5, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Geo Information Science for Natural Resources Management', 'department_id' => 5, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Wildlife and Range Management', 'department_id' => 5, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],

            //  Department of Silviculture and Forest Management 6
            ['name' => 'MPhil. Natural Resources and Environmental Governance', 'department_id' => 6, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Silviculture and Forest Management', 'department_id' => 6, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Silviculture and Forest Management', 'department_id' => 6, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],

            //  Department of Agroforestry 7
            ['name' => 'MPhil. Agroforestry',  'department_id' => 7, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Agroforestry',  'department_id' => 7, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],

            //  Department of Wood Science and Technology Management  8
            ['name' => 'MPhil. Packaging Technology and Management', 'department_id' => 8, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Wood Science and Technology', 'department_id' => 8, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],

            // Department of Fisheries and Watershed Management 9
            ['name' => 'MPhil. Aquaculture and Environment', 'department_id' => 9, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Fisheries Management', 'department_id' => 9, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Watershed Management', 'department_id' => 9, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Aquaculture and Environment', 'department_id' => 9, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Fisheries Management', 'department_id' => 9, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Watershed Management', 'department_id' => 9, 'faculty_id' => 2, 'college_id' => 1, 'type' => 'pg', 'span'=>4],

            // COLLEGE OF ART AND BUILT ENVIRONMENT
            // FACULTY OF BUILT ENVIRONMENT 3
            //    Programs without department
            ['name' => '205 BSc. Architecture', 'department_id' => null, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '853 BSc. Construction Technology and Management', 'department_id' => null, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '854 BSc. Quantity Surveying and Construction Economics', 'department_id' => null, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '306 BSc. Development Planning', 'department_id' => null, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '748 BSc. Human Settlement Planning', 'department_id' => null, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '307 BSc. Land Economy', 'department_id' => null, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '877 BSc. Real Estate', 'department_id' => null, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'ug', 'span'=>4],

            // Department Of Agriculture 10
            ['name' => 'MSc. Architecture (Top up) One Year', 'department_id' => 10, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MArch (Master of Architecture)', 'department_id' => 10, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil Architectural Studies  | Two Years', 'department_id' => 10, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Architecture', 'department_id' => 10, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            // Department of Construction Technology and Management 11
            ['name' => 'MSc. Construction Management', 'department_id' => 11, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Construction Management', 'department_id' => 11, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Procurement Management', 'department_id' => 11, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Procurement Management', 'department_id' => 11, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Procurement Management', 'department_id' => 11, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Project Management (One Year) vii. MPhil. Project Management', 'department_id' => 11, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Project Management', 'department_id' => 11, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Building Technology', 'department_id' => 11, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Building Technology', 'department_id' => 11, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Construction Management', 'department_id' => 11, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            //  Department of Planning 12
            ['name' => 'MSc. Development Planning and Management (SPRING) (Accra and Kumasi Centres   Weekend)', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Development Planning and Management (SPRING) (Accra and Kumasi Centres   Weekend)', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Development Policy and Planning (Accra and Kumasi Centres   Weekend)', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Development Policy and Planning (Accra and Kumasi Centres   Weekend)', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Development Studies (Accra and Kumasi Centres  | Weekend', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Development Studies (Accra and Kumasi Centres   Weekend)', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Planning (Accra and Kumasi Centres   Weekend)', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Planning (Accra and Kumasi Centres   Weekend)', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Transportation Planning (Accra and Kumasi Centres   Weekend)', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Development Studies', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Planning', 'department_id' => 12, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            //  Department of Land Economy 13
            ['name' => 'MSc. Real Estate (One Year   Weekend)', 'department_id' => 13, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Land Governance and Policy (One Year)', 'department_id' => 13, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Facilities Management (One Year)', 'department_id' => 13, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Land Management and Governance', 'department_id' => 13, 'faculty_id' => 3, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            //  FACULTY OF ART 4
            //    Programs without department
            ['name' => '744 BA. Communication Design', 'department_id' => null, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '303 BA. Integrated Rural Art and Industry', 'department_id' => null, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '304 BA. Publishing Studies', 'department_id' => null, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '1373 BA. Metal Product Design', 'department_id' => null, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '1276 BA. Textile Design and Technology', 'department_id' => null, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '301 BFA. Painting and Sculpture', 'department_id' => null, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '192 BSc. Fashion Design', 'department_id' => null, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'ug', 'span'=>4],
            ['name' => '1444 BSc. Ceramic Technology', 'department_id' => null, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'ug', 'span'=>4],

            // Department of Painting and Sculpture 14
            ['name' => 'MFA. Painting', 'department_id' => 14, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MFA. Sculpture', 'department_id' => 14, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MFA. Painting and Sculpture', 'department_id' => 14, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. African Art and Culture', 'department_id' => 14, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Creative Art Therapy', 'department_id' => 14, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Creative Art Therapy', 'department_id' => 14, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Painting', 'department_id' => 14, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Sculpture', 'department_id' => 14, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Painting and Sculpture', 'department_id' => 14, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. African Art and Culture', 'department_id' => 14, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            //  Department of Industrial Art 15
            ['name' => 'MFA. Ceramics', 'department_id' => 15, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MFA. Jewellery and Metalsmithing', 'department_id' => 15, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MFA. Textiles Design', 'department_id' => 15, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Textile Design Technology', 'department_id' => 15, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Ceramic Technology', 'department_id' => 15, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Fashion Design Technology', 'department_id' => 15, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Ceramic Technology', 'department_id' => 15, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Textile Design Technology', 'department_id' => 15, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Fashion Design Technology', 'department_id' => 15, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            //  Department of Indigenous Art and Technology 16
            ['name' => 'MPhil. Integrated Art', 'department_id' => 16, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            // Department of Publishing Studies 17
            ['name' => 'Department of Publishing Studies', 'department_id' => 17, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Publishing Studies', 'department_id' => 17, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Publishing Studies (Top Up', 'department_id' => 17, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            //  Department of Communication Design 18
            ['name' => 'MComm. Design', 'department_id' => 18, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Communication Design', 'department_id' => 18, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Visual Communication Design', 'department_id' => 18, 'faculty_id' => 4, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            //  FACULTY OF EDUCATIONAL STUDIES 5
            //    Programs without department
            ['name' => '1415 B.Ed. Junior High School Education (Mathematics, Science, ICT, Agricultural Science, History, Visual Arts and Geography)', 'department_id' => null, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'ug', 'span'=>4],

            // Department of Educational Innovations in Science and Technology 19
            ['name' => 'MA. Art Education (Regular/Weekend/Sandwich)', 'department_id' => 19, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Art Education (Regular/Weekend)', 'department_id' => 19, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Art Education (Top Up)', 'department_id' => 19, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'Master of Education (M.Ed.)   General Education (Regular/Sandwich)', 'department_id' => 19, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Educational Innovation and Leadership Science (Regular/Sandwich)', 'department_id' => 19, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Educational Innovation and Leadership Science (Regular/Weekend)', 'department_id' => 19, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Art Education (Regular/Weekend)', 'department_id' => 19, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            //  Department of Teacher Education 20
            ['name' => 'MPhil. Educational Planning and Administration (Regular/Weekend  | 2 years)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Educational Planning and Administration Top Up (Weekend   1 year)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'EDD. Educational Planning and Administration (Regular)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Mathematics Education (Regular/Weekend   2 years)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Mathematics Education Top Up (Weekend   1 year)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Language Education and Literacy', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Language Education and Literacy (Top Up)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. ICT Education (Regular/Weekend  | 2 years)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. ICT Education Top Up (Weekend  | 1 year)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Science Education (Regular/Weekend  | 2 years)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Science Education Top Up (Weekend  | 1 year)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Science Education (Regular)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. ICT Education (Regular)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Mathematics Education (Regular)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Language and Literacy Education (Regular)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Educational Planning and Administration (Regular)', 'department_id' => 20, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            // SANDWICH PROGRAMMES (TO BE RUN ONLINE AND FACETO FACE DURING GES VACATION) 21
            ['name' => 'MEd. Higher Education Pedagogy (Online)', 'department_id' => 21, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'Post Graduate Diploma in Education (Online)', 'department_id' => 21, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'Post Graduate Diploma in Education (KNUST STUDENTS ONLY)', 'department_id' => 21, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MEd. Educational Planning and Administration (Online)', 'department_id' => 21, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MEd. Mathematics Education (Online)', 'department_id' => 21, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MEd. ICT Education (Online)', 'department_id' => 21, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MEd. Science Education (Online)', 'department_id' => 21, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],
            ['name' => 'MEd. Language Education and Literacy (Online)', 'department_id' => 21, 'faculty_id' => 5, 'college_id' => 4, 'type' => 'pg', 'span'=>4],

            // COLLEGE OF ENGINEERING
            // FACULTY OF CIVIL AND GEO ENGINEERING 6
            //    Programs without Department
            ['name' => '208 BSc. Civil Engineering', 'department_id' => null, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '1420 BSc. Civil Engineering (Obuasi Campus)', 'department_id' => null, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '737 BSc. Geological Engineering', 'department_id' => null, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '226 BSc. Geological Engineering (Obuasi)', 'department_id' => null, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '738 BSc. Geomatic Engineering', 'department_id' => null, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '227 BSc. Geomatic Engineering (Obuasi Campus)', 'department_id' => null, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '546 BSc. Petroleum Engineering', 'department_id' => null, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'ug', 'span'=>4],

            // Department of Civil Engineering 22
            ['name' => 'MSc. Geotechnical Engineering (Regular, Weekend)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Geotechnical Engineering (Full Time)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Structural Engineering (Regular, Weekend)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Structural Engineering (Full Time)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Geotechnical Engineering', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Structural Engineering', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Disaster Prevention and Management (Regular, Weekend)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Water Engineering (Regular, Weekend)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Water Resources Engineering and Management (Regular, Weekend)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Water Resources Engineering and Management (FullTime)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Water Supply Engineering and Management (Regular, Weekend)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Environmental Sanitation and Waste Management (Regular, Weekend)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Water Supply and Environmental Sanitation (Full Time)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Water Supply and Environmental Sanitation (Full Time)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Environmental Sanitation and Waste Management', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Water Resources Management', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Water Supply and Treatment Technology', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Transport Systems (Infrastructure and Engineering)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Transport Systems (Infrastructure and Engineering)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Transport Systems (Urban Transport and Operations)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Transport Systems (Urban Transport and Operations)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'Ph.D. Transport Systems (Infrastructure and Engineering)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'Ph.D. Transport Systems (Urban Transport and Operations)', 'department_id' => 22, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // Department of Geomatic Engineering 23
            ['name' => 'MSc. Geomatic Engineering', 'department_id' => 23, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Geomatic Engineering', 'department_id' => 23, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Geographic Information System', 'department_id' => 23, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Geomatic Engineering', 'department_id' => 23, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // Department of Petroleum Engineering  24
            ['name' => 'MSc. Petroleum Engineering', 'department_id' => 24, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Petroleum Engineering', 'department_id' => 24, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Petroleum Geoscience', 'department_id' => 24, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Petroleum Geoscience', 'department_id' => 24, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Petroleum Engineering', 'department_id' => 24, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // Department of Geological Engineering  25
            ['name' => 'MSc. Geophysical Engineering', 'department_id' => 25, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Geological Engineering', 'department_id' => 25, 'faculty_id' => 6, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // FACULTY OF ELECTRICAL & COMPUTER ENGINEERING 7
            //   Programs without Department
            ['name' => '871 BSc. Biomedical Engineering', 'department_id' => null, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '212 BSc. Computer Engineering', 'department_id' => null, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '209 BSc. Electrical/Electronic Engineering', 'department_id' => null, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '199 BSc. Electrical/Electronic Engineering (Obuasi Campus)', 'department_id' => null, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '732 BSc. Telecommunications Engineering', 'department_id' => null, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'ug', 'span'=>4],

            // Department of Electrical and Electronic Engineering 26
            ['name' => 'MPhil. Power Systems Engineering', 'department_id' => 26, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Electrical Engineering', 'department_id' => 26, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // Department of Computer Engineering 27
            ['name' => 'MPhil. Computer Engineering', 'department_id' => 27, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Computer Engineering', 'department_id' => 27, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // Department of Telecommunication Engineering 28
            ['name' => 'MPhil. Telecommunication Engineering', 'department_id' => 28, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Telecommunication Engineering', 'department_id' => 28, 'faculty_id' => 7, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // FACULTY OF MECHANICAL & CHEMICAL ENGINEERING 8
            // Programs without Department
            ['name' => '206 BSc. Agricultural Engineering', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '881 BSc. Petrochemical Engineering', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '207 BSc. Chemical Engineering', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '950 BSc. Metallurgical Engineering', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '213 2BSc. Materials Engineering', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '217 BSc. Materials Engineering (Obuasi Campus)', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '1377 BSc. Marine Engineering', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '1376 BSc. Industrial Engineering', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '1375 BSc. Automobile Engineering', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '211 1BSc. Mechanical Engineering', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '1421 BSc. Mechanical Engineering (Obuasi Campus)', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],
            ['name' => '214 BSc. Aerospace Engineering', 'department_id' => null, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'ug', 'span'=>4],

            // Department of Chemical Engineering 29
            ['name' => 'MPhil. Chemical Engineering', 'department_id' => 29, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Chemical Engineering', 'department_id' => 29, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // Department of Agricultural and Biosystems Engineering 30
            ['name' => 'MPhil. Agricultural Machinery Engineering', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Agro Environmental Engineering', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Bioengineering', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Food and Post Harvest Engineering', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Soil and Water Engineering', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Intellectual Property (MIP)', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Agricultural Machinery Engineering', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Agro Environmental Engineering', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Bioengineering', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Food and Post Harvest Engineering', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Soil and Water Engineering', 'department_id' => 30, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // Department of Mechanical Engineering 31
            ['name' => 'MPhil. Mechanical Eng. (Thermo Fluids and Energy Systems) TopUp', 'department_id' => 31, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Mechanical Eng. (Applied Mechanics) Top Up', 'department_id' => 31, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Mechanical Eng. (Design and Manufacturing) Top Up', 'department_id' => 31, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Mechanical Engineering', 'department_id' => 31, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Sustainable Energy Technologies', 'department_id' => 31, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // Department of Materials Engineering 32
            ['name' => 'MPhil. Environmental Resources Management', 'department_id' => 32, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Materials Engineering', 'department_id' => 32, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Materials Engineering', 'department_id' => 32, 'faculty_id' => 8, 'college_id' => 3, 'type' => 'pg', 'span'=>4],

            // COLLEGE OF HEALTH SCIENCES
            // FACULTY OF PHARMACY AND PHARMACEUTICAL SCIENCES 9
            // Programs without Department
            ['name' => '110 Bachelor of Herbal Medicine (BHM)', 'department_id' => null, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '981 Doctor of Pharmacy (Pharm D)', 'department_id' => null, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '1277 Doctor of Pharmacy (Pharm D)  | 2 years Top Up (Practicing Pharmacists only)', 'department_id' => null, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'ug', 'span'=>4],

            // Department of Pharmaceutics 33
            ['name' => 'MSc. Pharmaceutical Technology', 'department_id' => 33, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Pharmaceutics', 'department_id' => 33, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Pharmaceutical Microbiology', 'department_id' => 33, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Pharmaceutics', 'department_id' => 33, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Pharmaceutical Microbiology', 'department_id' => 33, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Pharmacognosy 34
            ['name' => 'MPhil. Pharmacognosy', 'department_id' => 34, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Pharmacognosy', 'department_id' => 34, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Pharmaceutical Chemistry 35
            ['name' => 'MPhil. Pharmaceutical Chemistry', 'department_id' => 35, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Pharmaceutical Chemistry', 'department_id' => 35, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Pharmacy Practice 36
            ['name' => 'MSc. Clinical Pharmacy (Part Time)', 'department_id' => 36, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Clinical Pharmacy (Full Time)', 'department_id' => 36, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Clinical Pharmacy', 'department_id' => 36, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Social Pharmacy', 'department_id' => 36, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'Department of Pharmacology', 'department_id' => 36, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil Pharmacology', 'department_id' => 36, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil Clinical Pharmacology', 'department_id' => 36, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Pharmacology', 'department_id' => 36, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Clinical Pharmacology', 'department_id' => 36, 'faculty_id' => 9, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // FACULTY OF ALLIED HEALTH SCIENCES 10
            // Programs without department
            ['name' => '531 BSc. Nursing', 'department_id' => null, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '1483 BSc. Nursing (Obuasi Campus)', 'department_id' => null, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '912 Nursing (Emergency Option for Practicing Nurses Only)', 'department_id' => null, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '952 BSc. Midwifery (Females only)', 'department_id' => null, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '418 BSc. Midwifery (Females practicing Midwives only) (Sandwich)', 'department_id' => null, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '1484 BSc. Midwifery (Obuasi Campus)', 'department_id' => null, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '1370 BSc. Physiotherapy and Sports Science', 'department_id' => null, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '1374 BSc. Medical Imaging', 'department_id' => null, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '106 BSc. Medical Laboratory Science', 'department_id' => null, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '1485 BSc. Medical Laboratory Science (Obuasi Campus)', 'department_id' => null, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'ug', 'span'=>4],

            // Department of Nursing 37
            ['name' => 'MSc. Clinical Nursing', 'department_id' => 37, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Nursing', 'department_id' => 37, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Physiotherapy and Sports Science 38
            ['name' => 'MPhil. Clinical Rehabilitation and Exercise Therapy', 'department_id' => 38, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Medical Diagnostics 39
            ['name' => 'MPhil. Haematology', 'department_id' => 39, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Medical Imaging', 'department_id' => 39, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Haematology', 'department_id' => 39, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Medical Imaging', 'department_id' => 39, 'faculty_id' => 10, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // SCHOOL OF MEDICINE AND DENTISTRY 11
            // Programs without Department
            ['name' => '105 Human Biology (Medicine) (MBChB)', 'department_id' => null, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '802 Bachelor of Dental Surgery (BDS) (Fee paying only)', 'department_id' => null, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            ['name' => '1371 BSc. Physician Assistantship', 'department_id' => null, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'ug', 'span'=>4],

            // Department of Molecular Medicine 40
            ['name' => 'MPhil. Chemical Pathology', 'department_id' => 40, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Molecular Medicine', 'department_id' => 40, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Immunology', 'department_id' => 40, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Chemical Pathology', 'department_id' => 40, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Molecular Medicine', 'department_id' => 40, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Immunology', 'department_id' => 40, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Clinical Microbiology 41
            ['name' => 'MPhil. Clinical Microbiology', 'department_id' => 41, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Clinical Microbiology', 'department_id' => 41, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Anatomy 42
            ['name' => 'MPhil. Human Anatomy and Cell Biology', 'department_id' => 42, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Human Anatomy and Cell Biology (Morphological Diagnostics)', 'department_id' => 42, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Human Anatomy and Forensic Science', 'department_id' => 42, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Mortuary Science and Management', 'department_id' => 42, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Human Anatomy and Cell Biology', 'department_id' => 42, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Human Anatomy and Forensic Science', 'department_id' => 42, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Physiology 43
            ['name' => 'MPhil. Physiology', 'department_id' => 43, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Speech and Language Therapy', 'department_id' => 43, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Comparative Anatomy', 'department_id' => 43, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // SCHOOL OF VETERINARY MEDICINE  44
            ['name' => 'Master of Veterinary Science in Anatomy', 'department_id' => 44, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Integrative Pathobiology', 'department_id' => 44, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. One Health', 'department_id' => 44, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Veterinary Anatomy', 'department_id' => 44, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            ['name' => '  882 Doctor of Veterinary Medicine (DVM)', 'department_id' => 44, 'faculty_id' => 11, 'college_id' => 6, 'type' => 'ug', 'span'=>4],
            // SCHOOL OF PUBLIC HEALTH   12
            // Programs Without Departments
            ['name' => '953 BSc. Disability and Rehabilitation Studies', 'faculty_id' => 12, 'college_id' => 6, 'type' => 'ug', 'span'=>4],

            // Department Unknown
            ['name' => 'PhD. Public health', 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Health Education, Promotion and Disability Studies  45
            ['name' => 'MPH/MSc. Health Education and Promotion (Regular/Weekend)', 'department_id' => 45, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Disability, Rehabilitation and Development (Full Time/ Weekend)', 'department_id' => 45, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Population, Family and Reproductive Health 46
            ['name' => 'MSc. Population and Reproductive Health (One Year   Full Time/ Weekend)', 'department_id' => 46, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPH. Population and Reproductive Health (One Year   Full Time/ Weekend)', 'department_id' => 46, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Occupational and Environmental Health and Safety 47
            ['name' => 'MSc. Occupational and Environmental Health & Safety (One Year   Full Time/ Weekend)', 'department_id' => 47, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPH. Occupational and Environmental Health & Safety (One Year   Full Time/ Weekend)', 'department_id' => 47, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Health Policy, Management and Economics 48
            ['name' => 'MSc. Health Services Planning and Management (One Year  | Regular/Weekend)', 'department_id' => 48, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPH. Health Services Planning and Management (One Year  | Regular/Weekend)', 'department_id' => 48, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Health Systems Research and Management (Regular) iv. MPH. Health Systems Research and Management (Weekend)', 'department_id' => 48, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Health Systems Research and Management (Regular/ Weekend', 'department_id' => 48, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Epidemiology and Biostatistics 49
            ['name' => 'MPhil. Field Epidemiology and Applied Biostatistics', 'department_id' => 49, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // Department of Global and International Health 50
            ['name' => 'MPH. Global Health (One Year)', 'department_id' => 50, 'faculty_id' => 12, 'college_id' => 6, 'type' => 'pg', 'span'=>4],

            // COLLEGE OF HUMANITIES AND SOCIAL SCIENCES
            // FACULTY OF LAW  13
            // No Known department
            ['name' => 'Master of Laws (LLM)', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Law', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'pg', 'span'=>4],

            ['name' => '532 Bachelor of Laws (LLB)', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '747 LLB (Degree Holders Only) (Fee Paying)', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],

            // FACULTY OF SOCIAL SCIENCES 14
            // Programs without departments
            ['name' => '795 BA. Economics', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '794 BA. English', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '793 BA. Geography and Rural Development', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '894 BA. History', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '791 BA. Political Studies', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1386 1BA. Akan Language and Culture', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1387 BA. French and Francophone Studies', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1388 BA. Linguistics', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1389 BA. Media and Communication Studies', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '797 BA. Religious Studies', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '977 BA. Sociology', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '971 BA. Social Work', 'faculty_id' => 13, 'college_id' => 2, 'type' => 'ug', 'span'=>4],

            // Department of Economics 51
            ['name' => 'MSc. Economics (One Year)', 'department_id' => 51, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Economics and Finance (One Year)', 'department_id' => 51, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => '. MSc. Business Economics (One Year)', 'department_id' => 51, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Economics', 'department_id' => 51, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Economics', 'department_id' => 51, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],

            // Department of Language and Communication Sciences 52
            ['name' => 'MPhil. French', 'department_id' => 52, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. French', 'department_id' => 52, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],

            // Department of Geography and Rural Development 53
            ['name' => 'MSc. Geography and Sustainable Development (One Year)', 'department_id' => 53, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Geography and Rural Development', 'department_id' => 53, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Geography and Rural Development', 'department_id' => 53, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],

            // Department of Religious Studies 54
            ['name' => 'MA. Religious Studies (One Year)', 'department_id' => 54, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Religious Studies', 'department_id' => 54, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Religious Studies', 'department_id' => 54, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],

            // Department of Sociology and Social Work 55
            ['name' => 'MA. Sociology', 'department_id' => 55, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Sociology', 'department_id' => 55, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MA. Social Work (One Year)', 'department_id' => 55, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Social Work', 'department_id' => 55, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Sociology', 'department_id' => 55, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],

            // Department of History and Political Studies 56
            ['name' => 'MA. Chieftaincy and Traditional Leadership (One Year)', 'department_id' => 56, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'Master of Public Administration (Full Time/Weekend)', 'department_id' => 56, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MA. Asante History (One Year)', 'department_id' => 56, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Historical Studies', 'department_id' => 56, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Political Science', 'department_id' => 56, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Historical Studies', 'department_id' => 56, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],

            // KNUST SCHOOL OF BUSINESS (KSB) 57
            ['name' => 'Master of Business Administration (MBA)   Regular/Evening/ Weekend', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'Master of Science Programmes (Weekends Only)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Organisational Leadership', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Business and Management', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Management and Human Resource Strategy', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Logistics and Supply Chain Management (Weekend Only)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Procurement and Supply Chain Management (Weekend Only)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Accounting', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Finance', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'pg', 'span'=>4],
            // UnderGraduate Programs
            ['name' => '1272 BSc. Business Administration(Human Resource Management /Management)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1431 BSc. Business Administration(Human Resource Management /Management) (Obuasi Campus)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1273 BSc. Business Administration(Marketing/International Business)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1433 BSc. Business Administration(Marketing/International Business)(Obuasi Campus)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1274 BSc. Business Administration(Accounting / Banking and Finance)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1432 BSc. Business Administration(Accounting / Banking and Finance)(Obuasi Campus)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1275 BSc. Business Administration(Logistics and Supply Chain Management/Business Information Technology)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '1423 BSc. Business Administration(Logistics and Supply Chain Management/Business Information Technology) (Obuasi Campus)', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'ug', 'span'=>4],
            ['name' => '191 BSc. Hospitality and Tourism Management', 'department_id' => 57, 'faculty_id' => 14, 'college_id' => 2, 'type' => 'ug', 'span'=>4],

            // COLLEGE OF SCIENCE
            // FACULTY OF BIOSCIENCES  15
            // Programs without Departments
            ['name' => '102 BSc. Biochemistry', 'department_id' => null, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '547 BSc. Food Science and Technology', 'department_id' => null, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '103 BSc. Biological Science', 'department_id' => null, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '548 BSc. Environmental Science', 'department_id' => null, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '1422 BSc. Environmental Science(Obuasi Campus)', 'department_id' => null, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '109 Doctor of Optometry', 'department_id' => null, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'ug', 'span'=>4],

            // Department of Biochemistry and Biotechnology 58
            ['name' => 'MSc. Biotechnology', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Biotechnology', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Biochemistry', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Biodata Analytics and Computational Genomics', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Biodata Analytics and Computational Genomics', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Forensic Science', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Forensic Science', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Human Nutrition and Dietetics', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Biotechnology', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Biochemistry', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Human Nutrition and Dietetics', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Biodata Analytics and Computational Genomics', 'department_id' => 58, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // Department of Food Science and Technology 59
            ['name' => 'MSc. Food Quality Management', 'department_id' => 59, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Food Science and Technology', 'department_id' => 59, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Food Science and Technology', 'department_id' => 59, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Food Science and Technology', 'department_id' => 59, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // Department of Environmental Science 60
            ['name' => 'MPhil. Environmental Science', 'department_id' => 60, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Environmental Science (Top Up)', 'department_id' => 60, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Environmental Science', 'department_id' => 60, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // Department of Theoretical and Applied Biology 61
            ['name' => 'MPhil. Parasitology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Ecology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Entomology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Plant Physiology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Microbiology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Plant Pathology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Reproductive Biology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Parasitology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Ecology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Entomology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Animal Physiology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Limnology and Fisheries', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Plant Physiology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Microbiology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Plant Pathology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Reproductive Biology', 'department_id' => 61, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // Department of Optometry and Visual Science  62
            ['name' => 'MPhil Vision Science', 'department_id' => 62, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Vision Science', 'department_id' => 62, 'faculty_id' => 15, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // FACULTY OF PHYSICAL & COMPUTATIONAL SCIENCES 16
            // Programs with no department
            ['name' => '104 BSc. Chemistry', 'faculty_id' => 16, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '202 BSc. Mathematics', 'faculty_id' => 16, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '201 BSc. Physics', 'faculty_id' => 16, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '203 BSc. Computer Science', 'faculty_id' => 16, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '951 BSc. Statistics', 'faculty_id' => 16, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '750 BSc. Actuarial Science', 'faculty_id' => 16, 'college_id' => 5, 'type' => 'ug', 'span'=>4],
            ['name' => '876 BSc. Meteorology and Climate Science', 'faculty_id' => 16, 'college_id' => 5, 'type' => 'ug', 'span'=>4],

            // Department of Chemistry 63
            ['name' => 'MPhil. Chemistry', 'department_id' => 63, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Organic and Natural Products', 'department_id' => 63, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Analytical Chemistry', 'department_id' => 63, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Environmental Chemistry', 'department_id' => 63, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Physical Chemistry', 'department_id' => 63, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Polymer Science and Technology', 'department_id' => 63, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Chemistry', 'department_id' => 63, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // Department of Physics 64
            ['name' => 'MPhil. Geophysics', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Environmental Physics', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Solid State Physics', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Materials Science', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Nuclear Science and Technology', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Mathematical and Computational Physics', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Geophysics', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Environmental Physics', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Solid State Physics', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Materials Science', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Materials Science', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Nuclear Science and Technology', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Mathematical and Computational Physics', 'department_id' => 64, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // Department of Meteorology and Climate Science 65
            ['name' => 'MPhil. Meteorology and Climate Science', 'department_id' => 65, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Meteorology and Climate Science', 'department_id' => 65, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // Department of Mathematics 66
            ['name' => 'MPhil. Pure Mathematics', 'department_id' => 66, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Applied Mathematics', 'department_id' => 66, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Scientific Computing and Industrial Modeling', 'department_id' => 66, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Scientific Computing and Industrial Modeling', 'department_id' => 66, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Pure Mathematics', 'department_id' => 66, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Applied Mathematics', 'department_id' => 66, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Pure Mathematics', 'department_id' => 66, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // Department of Statistics and Actuarial Science 67
            ['name' => 'MPhil. Actuarial Science', 'department_id' => 67, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Mathematical Statistics', 'department_id' => 67, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Actuarial Science', 'department_id' => 67, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD Mathematical Statistics', 'department_id' => 67, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // Department of Computer Science 68
            ['name' => 'MSc. Computer Science', 'department_id' => 68, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Computer Science', 'department_id' => 68, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Cyber Security and Digital Forensics', 'department_id' => 68, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Cyber Security and Digital Forensics', 'department_id' => 68, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Information Technology', 'department_id' => 68, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Information Technology', 'department_id' => 68, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Computer Science', 'department_id' => 68, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'PhD. Information Technology', 'department_id' => 68, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

            // INSTITUTE OF DISTANCE LEARNING 69
            ['name' => 'MSc. Health Informatics', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Information Technology', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Human Nutrition', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Food Quality Management', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Biotechnology', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Forensic Science', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'Commonwealth Master of Business Administration (CMBA)', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MBA International Business', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Planning, Monitoring and Evaluation', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Industrial Finance and Investment', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Business Consulting and Enterprise Risk Management', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Educational Innovations and Leadership Science', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'Master of Education (M.Ed)', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Project Management (available at the Accra and Takoradi Centres only) ,', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Development Management', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'Master of Public Administration (MPA)', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Security and Justice Administration', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Energy and Sustainable Management', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Hospitality and Tourism Management', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Strategic Management and Leadership', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Corporate Governance and Strategic Leadership', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Insurance and Business Continuity', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Development Finance', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Management and Human Resource Strategy', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Marketing', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Economics (available at the Accra Centre only)', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Post Harvest Technology (Horticulture)', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Logistics and Supply Chain Management', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Procurement and Supply Chain Management', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Geography and Sustainable Development', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Accounting and Finance', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Actuarial Science', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Applied Statistics', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Environmental Science', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Agribusiness Management', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Mechanical Engineering', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Cyber Security and Digital Forensics', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Environmental Resources Management', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Communication System and Network Engineering', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'Professional Master of Engineering with Management (MEng) Programmes', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MPhil. Crop Science', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc. Agricultural Extension and Development Communication', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],
            ['name' => 'MSc Physics', 'department_id' => 69, 'faculty_id' => 16, 'college_id' => 5, 'type' => 'pg', 'span'=>4],

        ];
        // Program::factory(150)->create();

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}

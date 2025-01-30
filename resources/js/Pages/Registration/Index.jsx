import React, { useEffect, useState } from 'react';
import { Head } from '@inertiajs/inertia-react';

const Index = () => {
    const [data, setData] = useState({
        teachers: [],
        students: [],
        courses: [],
        registers: []
    });

    useEffect(() => {
        fetch('/registration')
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    setData(result.data);
                }
            })
            .catch(error => console.error('Error:', error));
    }, []);

    return (
        <>
            <Head title="ระบบลงทะเบียน" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h1 className="text-3xl font-bold mb-6">ระบบลงทะเบียน</h1>

                    <div className="mb-8">
                        <h2 className="text-2xl font-semibold mb-4">อาจารย์</h2>
                        <ul className="space-y-2">
                            {data.teachers.map((teacher) => (
                                <li key={teacher.id} className="bg-white shadow overflow-hidden sm:rounded-lg p-4">
                                    <p className="font-bold">{teacher.first_name} {teacher.last_name}</p>
                                    <p>อีเมล: {teacher.email}</p>
                                    <p>แผนก: {teacher.department}</p>
                                </li>
                            ))}
                        </ul>
                    </div>

                    <div className="mb-8">
                        <h2 className="text-2xl font-semibold mb-4">หลักสูตร</h2>
                        <ul className="space-y-2">
                            {data.courses.map((course) => (
                                <li key={course.id} className="bg-white shadow overflow-hidden sm:rounded-lg p-4">
                                    <p className="font-bold">{course.course_name}</p>
                                    <p>หน่วยกิต: {course.credit_hours}</p>
                                    <p>อาจารย์ผู้สอน: {course.teacher.first_name} {course.teacher.last_name}</p>
                                </li>
                            ))}
                        </ul>
                    </div>

                    <div className="mb-8">
                        <h2 className="text-2xl font-semibold mb-4">นักศึกษา</h2>
                        <ul className="space-y-2">
                            {data.students.map((student) => (
                                <li key={student.id} className="bg-white shadow overflow-hidden sm:rounded-lg p-4">
                                    <p className="font-bold">{student.first_name} {student.last_name}</p>
                                    <p>อีเมล: {student.email}</p>
                                    <p>ปีที่เข้าศึกษา: {student.enrollment_year}</p>
                                </li>
                            ))}
                        </ul>
                    </div>

                    <div>
                        <h2 className="text-2xl font-semibold mb-4">การลงทะเบียน</h2>
                        <ul className="space-y-2">
                            {data.registers.map((register) => (
                                <li key={register.id} className="bg-white shadow overflow-hidden sm:rounded-lg p-4">
                                    <p className="font-bold">
                                        {register.student.first_name} {register.student.last_name} - {register.course.course_name}
                                    </p>
                                    <p>วันที่ลงทะเบียน: {register.registration_date}</p>
                                    <p>สถานะ: {register.status === 'confirmed' ? 'ยืนยันแล้ว' : 'ยกเลิก'}</p>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Index;

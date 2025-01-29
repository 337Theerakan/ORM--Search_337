// resources/js/Pages/RoomSys/Index.jsx

import React, { useEffect, useState } from 'react';

const Index = () => {
    const [rooms, setRooms] = useState([]);

    useEffect(() => {
        // เรียก API เพื่อดึงข้อมูลห้อง
        fetch('/roomsys')
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    setRooms(data.data);  // เก็บข้อมูลใน state
                }
            })
            .catch((error) => {
                console.error('Error fetching rooms:', error);
            });
    }, []);

    return (
        <div>
            <h1>Room List</h1>
            <ul>
                {rooms.map((room) => (
                    <li key={room.id}>
                        <h2>{room.room_number} - {room.roomType.type_name}</h2>
                        <p>Status: {room.status}</p>
                        <p>Bookings:</p>
                        <ul>
                            {room.bookings.map((booking) => (
                                <li key={booking.id}>
                                    <p>Check-in: {booking.check_in_date}</p>
                                    <p>Check-out: {booking.check_out_date}</p>
                                    <p>Status: {booking.status}</p>
                                </li>
                            ))}
                        </ul>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Index;

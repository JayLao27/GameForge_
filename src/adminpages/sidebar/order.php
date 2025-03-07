<?php include '../sidebar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="bg-white shadow-md rounded-md p-4">
    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">All Orders</h2>
        <select class="border p-2">
            <option>March</option>
            <option>April</option>
            <option>May</option>
        </select>
    </div>

    <table class="w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="p-2">Order No.</th>
                <th class="p-2">Name</th>
                <th class="p-2">Address</th>
                <th class="p-2">Date</th>
                <th class="p-2">Price</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <td class="p-2">001</td>
                <td class="p-2">Rodeo James</td>
                <td class="p-2">Blk. 34, Deca Village</td>
                <td class="p-2">01 Mar. 2025</td>
                <td class="p-2">₱10,999.00</td>
                <td class="p-2 text-yellow-500">Pending</td>
            </tr>
            <tr class="border-b">
                <td class="p-2">002</td>
                <td class="p-2">Zelensky Duke</td>
                <td class="p-2">Blk. 12, Emily Village</td>
                <td class="p-2">12 Mar. 2025</td>
                <td class="p-2">₱15,459.00</td>
                <td class="p-2 text-yellow-500">Pending</td>
            </tr>
            <tr class="border-b">
                <td class="p-2">003</td>
                <td class="p-2">Ronaldo Messi</td>
                <td class="p-2">Carmelite Village</td>
                <td class="p-2">19 Mar. 2025</td>
                <td class="p-2">₱2,104.00</td>
                <td class="p-2 text-red-500">Refund</td>
            </tr>
            <tr class="border-b">
                <td class="p-2">004</td>
                <td class="p-2">Leonardo Corte</td>
                <td class="p-2">Las Casas Village</td>
                <td class="p-2">19 Mar. 2025</td>
                <td class="p-2">₱5,199.00</td>
                <td class="p-2 text-green-500">Completed</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
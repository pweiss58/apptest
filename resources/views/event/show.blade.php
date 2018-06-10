<!DOCTYPE html>
<html>
<head>
    <title>Event {{ $event->id }}</title>
</head>
<body>
<h1>Event {{ $event->id }}</h1>
<ul>
    <li>StartDate: {{ $event->startDate }}</li>
    <li>EndDate: {{ $event->endDate }}</li>
    <li>EventSetId: {{ $event->eventset_id }}</li>
</ul>
</body>
</html>
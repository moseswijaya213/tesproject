<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="invoice">
    <div class="invoicetitle">
        <div>
            Internal Request
        </div>
    </div>

    <div class="invoiceheader">
        <div class="invoiceleft">
            <div>
                <input type="checkbox">
                <label for="new-location">New Location Set Up</label>
            </div>
            <div>
                <input type="checkbox">
                <label for="existing-location">Existing Location Set Up (Mandatory Approval BD)</label>
            </div>
            <div>
                <input type="checkbox">
                <label for="repair">Repair / Replacement Existing Location (BA Attachment)</label>
            </div><br>
            <div>
                <input type="checkbox">
                <label>Location: </label>
            </div>
        </div>

        <div class="invoiceright">
            <div>Submission Date : <input type="text" required></div>
            <div>Expected Date IR :</div>
        </div>
    </div>
    <table class="invoicehead table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Item</th>
                <th>Specification</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody class="table-hover">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>


</body>
<button class="submitbutton" onclick="window.print()">Download PDF</button>

</html>
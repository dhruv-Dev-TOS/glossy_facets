$(function() {
    $('.simpleTable').footable();
    $('.sortingTable').footable();
    $('.filterTable').footable();
    callPagination()
    callPaginationButton();
    callShowHideColumn();
});

function callPagination() {
    $('.paginationTable').footable({
        "paging": {
            "enabled": true
        },
        "columns": [{
                "name": "id",
                "title": "ID",
                "breakpoints": "xs sm",
                "type": "number",
                "style": {
                    "width": 80,
                    "maxWidth": 80
                }
            },
            {
                "name": "firstName",
                "title": "First Name"
            },
            {
                "name": "lastName",
                "title": "Last Name"
            },
            {
                "name": "something",
                "title": "Never seen but always around",
                "visible": false,
                "filterable": false
            },
            {
                "name": "jobTitle",
                "title": "Job Title",
                "breakpoints": "xs sm",
                "style": {
                    "maxWidth": 200,
                    "overflow": "hidden",
                    "textOverflow": "ellipsis",
                    "wordBreak": "keep-all",
                    "whiteSpace": "nowrap"
                }
            },
            {
                "name": "started",
                "title": "Started On",
                "type": "date",
                "breakpoints": "xs sm md",
                "formatString": "MMM YYYY"
            },
            {
                "name": "dob",
                "title": "Date of Birth",
                "type": "date",
                "breakpoints": "xs sm md",
                "formatString": "DD MMM YYYY"
            },
            {
                "name": "status",
                "title": "Status"
            }
        ],
        "rows": [
            { "id": 1, "firstName": "Annemarie", "lastName": "Bruening", "something": 1381105566987, "jobTitle": "Cloak Room Attendant", "started": 1367700388909, "dob": 122365714987, "status": "Suspended" },
            { "id": 2, "firstName": "Nelly", "lastName": "Lusher", "something": 1267237540208, "jobTitle": "Broadcast Maintenance Engineer", "started": 1382739570973, "dob": 183768652128, "status": "Disabled" },
            { "id": 3, "firstName": "Lorraine", "lastName": "Kyger", "something": 1263216405811, "jobTitle": "Geophysicist", "started": 1265199486212, "dob": 414197000409, "status": "Active" },
            { "id": 4, "firstName": "Maire", "lastName": "Vanatta", "something": 1317652005631, "jobTitle": "Gaming Cage Cashier", "started": 1359190254082, "dob": 381574699574, "status": "Disabled" },
            { "id": 5, "firstName": "Whiney", "lastName": "Keasler", "something": 1297738568550, "jobTitle": "High School Librarian", "started": 1377538533615, "dob": -11216050657, "status": "Active" },
            { "id": 6, "firstName": "Nikia", "lastName": "Badgett", "something": 1283192889859, "jobTitle": "Clown", "started": 1348067291754, "dob": -236655382175, "status": "Active" },
            { "id": 7, "firstName": "Renea", "lastName": "Stever", "something": 1289586239969, "jobTitle": "Work Ticket Distributor", "started": 1312738712940, "dob": 483475202947, "status": "Disabled" },
            { "id": 8, "firstName": "Rayna", "lastName": "Resler", "something": 1351969871214, "jobTitle": "Ordnance Engineer", "started": 1300981406722, "dob": 267565804332, "status": "Disabled" },
            { "id": 9, "firstName": "Sephnie", "lastName": "Cooke", "something": 1318107009703, "jobTitle": "Accounts Collector", "started": 1348566414201, "dob": 84698632860, "status": "Suspended" },
            { "id": 10, "firstName": "Lauri", "lastName": "Kyles", "something": 1298847936600, "jobTitle": "Commercial Lender", "started": 1306984494872, "dob": 647549298565, "status": "Disabled" },
            { "id": 11, "firstName": "Maria", "lastName": "Hosler", "something": 1372447291002, "jobTitle": "Auto Detailer", "started": 1295239832657, "dob": 92796339552, "status": "Suspended" },
            { "id": 12, "firstName": "Lakeshia", "lastName": "Sprinkle", "something": 1296451003728, "jobTitle": "Garment Presser", "started": 1350695946669, "dob": 6068444160, "status": "Suspended" },
            { "id": 13, "firstName": "Isidra", "lastName": "Dragoo", "something": 1285852466255, "jobTitle": "Window Trimmer", "started": 1264658548150, "dob": 129659544744, "status": "Active" },
            { "id": 14, "firstName": "Marquia", "lastName": "Ardrey", "something": 1336968147859, "jobTitle": "Broadcast Maintenance Engineer", "started": 1281348596711, "dob": 69513590957, "status": "Disabled" },
            { "id": 15, "firstName": "Jua", "lastName": "Bottom", "something": 1322560108993, "jobTitle": "Broadcast Maintenance Engineer", "started": 1350354712910, "dob": 397465403667, "status": "Active" },
            { "id": 16, "firstName": "Delana", "lastName": "Sprouse", "something": 1367925208609, "jobTitle": "High School Librarian", "started": 1360754556666, "dob": -101355021375, "status": "Disabled" },
            { "id": 17, "firstName": "Annamaria", "lastName": "Pennock", "something": 1385602980951, "jobTitle": "Photocopying Equipment Repairer", "started": 1267426062440, "dob": 129358493928, "status": "Active" },
            { "id": 18, "firstName": "Junie", "lastName": "Leinen", "something": 1270540402378, "jobTitle": "Roller Skater", "started": 1343534987824, "dob": 405467757390, "status": "Suspended" }
        ]
    });
}

function callPaginationButton() {
    $('[data-page-size]').on('click', function(e) {
        e.preventDefault();
        var newSize = $(this).data('pageSize');
        FooTable.get('#paginationBtn').pageSize(newSize);
    });
    $('#paginationBtn').footable();
}

function callShowHideColumn() {
    $('#hidecolumn').footable({
        "expandFirst": true,
        "columns": [
            { "name": "id", "visible": false },
            { "name": "firstName", "title": "First Name" },
            { "name": "lastName", "title": "Last Name" },
            { "name": "jobTitle", "title": "Job Title", "breakpoints": "xs" },
            { "name": "started", "title": "Started On", "breakpoints": "xs sm" },
            { "name": "dob", "title": "Date of Birth", "breakpoints": "all" }
        ],
        "rows": [
            { "id": 1, "firstName": "Dennise", "lastName": "Fuhrman", "jobTitle": "High School History Teacher", "started": "November 8th 2011", "dob": "July 25th 1960" },
            { "id": 2, "firstName": "Elodia", "lastName": "Weisz", "jobTitle": "Wallpaperer Helper", "started": "October 15th 2010", "dob": "March 30th 1982" },
            { "id": 3, "firstName": "Raeann", "lastName": "Haner", "jobTitle": "Internal Medicine Nurse Practitioner", "started": "November 28th 2013", "dob": "February 26th 1966" },
            { "id": 4, "firstName": "Junie", "lastName": "Landa", "jobTitle": "Offbearer", "started": "October 31st 2010", "dob": "March 29th 1966" },
            { "id": 5, "firstName": "Solomon", "lastName": "Bittinger", "jobTitle": "Roller Skater", "started": "December 29th 2011", "dob": "September 22nd 1964" },
            { "id": 6, "firstName": "Bar", "lastName": "Lewis", "jobTitle": "Clown", "started": "November 12th 2012", "dob": "August 4th 1991" },
            { "id": 7, "firstName": "Usha", "lastName": "Leak", "jobTitle": "Ships Electronic Warfare Officer", "started": "August 14th 2012", "dob": "November 20th 1979" },
            { "id": 8, "firstName": "Lorriane", "lastName": "Cooke", "jobTitle": "Technical Services Librarian", "started": "September 21st 2010", "dob": "April 7th 1969" }
        ]
    });
}
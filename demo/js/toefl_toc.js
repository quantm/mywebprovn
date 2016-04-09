//
// Copyright (c) 2006 by Conor O'Mahony.
// For enquiries, please email GubuSoft@GubuSoft.com.
// Please keep all copyright notices below.
// Original author of TreeView script is Marcelino Martins.
//
// This document includes the TreeView script.
// The TreeView script can be found at http://www.TreeView.net.
// The script is Copyright (c) 2006 by Conor O'Mahony.
//
// You can find general instructions for this file at www.treeview.net. 
//

// Configures whether the names of the nodes are links (or whether only the icons
// are links).
USETEXTLINKS = 1

// Configures whether the tree is fully open upon loading of the page, or whether
// only the root node is visible.
STARTALLOPEN = 0

// Specify if the images are in a subdirectory;
ICONPATH = 'http://myweb.pro.vn/images/node/'


foldersTree = gFld("<i>TOEFL Internet-Based Test</i>", "")
foldersTree.treeID = "Frameset"
foldersTree.iconSrc = ICONPATH + "toefl.png"
foldersTree.iconSrcClosed = ICONPATH + "folder_open.png"

//start model test 1
aux1 = insFld(foldersTree, gFld("MODEL TEST 1: PRETEST", ""))

//start reading section
aux2 = insFld(aux1, gFld("Reading Section", ""))
insDoc(aux2, gLnk("R", "Reading 01: Beowulf", ""))
insDoc(aux2, gLnk("R", "Reading 02: Thermoregulation", ""))
//end reading section


//start listening
aux2 = insFld(aux1, gFld("Listening Section", ""))
insDoc(aux2, gLnk("R", "Listening 01: Learning Center", ""))
insDoc(aux2, gLnk("R", "Listening 02: Geology Class", ""))
insDoc(aux2, gLnk("R", "Listening 03: Art Class", ""))
insDoc(aux2, gLnk("R", "Listening 04: Professor `s Office", ""))
insDoc(aux2, gLnk("R", "Listening 05: Astronomy Class", ""))
insDoc(aux2, gLnk("R", "Listening 06: Psychology Class", ""))
insDoc(aux2, gLnk("R", "Listening 07: Bookstore", ""))
insDoc(aux2, gLnk("R", "Listening 08: Environmental Science Class", ""))
insDoc(aux2, gLnk("R", "Listening 08: Philosophy Class", ""))
//end listening

aux2 = insFld(aux1, gFld("Speaking Section", ""))
aux2 = insFld(aux1, gFld("Writting Section", ""))
//end model test 1

//start 3
aux1 = insFld(foldersTree, gFld("ACADEMIC SKILLS", ""))
insDoc(aux1, gLnk("R", "Taking Notes", ""))
insDoc(aux1, gLnk("B", "Paraphrasing", ""))
insDoc(aux1, gLnk("T", "Summarizing", ""))
insDoc(aux1, gLnk("T", "Sythesizing", ""))
//end 3

//start 4
aux1 = insFld(foldersTree, gFld("MODEL TEST 2: PROGRESS TEST", ""))
aux2 = insFld(aux1, gFld("Reading Section", ""))
insDoc(aux2, gLnk("R", "Reading 01: Resources and Industrialism in Canada", ""))
insDoc(aux2, gLnk("R", "Reading 02: Looking at the Theatre History", ""))
insDoc(aux2, gLnk("R", "Reading 03: Geothermal Energy", ""))
insDoc(aux2, gLnk("R", "Reading 04: Migration from Asia", ""))

aux2 = insFld(aux1, gFld("Listening Section", ""))
aux2 = insFld(aux1, gFld("Writting Section", ""))
aux2 = insFld(aux1, gFld("Speaking Section", ""))

//end 4

//start 5
start_05 = insFld(foldersTree, gFld("REVIEW OF TOEFL iBT SECTIONS", ""))

start_05_child = insFld(start_05, gFld("Reading", ""))
insDoc(start_05_child, gLnk("R", "Overview of the Reading Section", ""))
insDoc(start_05_child, gLnk("R", "Review of Problems for the Reading Section", ""))
insDoc(start_05_child, gLnk("R", "Reading Strategies", ""))
insDoc(start_05_child, gLnk("R", "Applying the Academicc Skills to the TOELF", ""))
insDoc(start_05_child, gLnk("R", "Quiz for the Reading Section", ""))
insDoc(start_05_child, gLnk("R", "Study Plan", ""))
insDoc(start_05_child, gLnk("R", "Extra Credit", ""))
insDoc(start_05_child, gLnk("R", "Advisor`s Office", ""))

start_05_child = insFld(start_05, gFld("Listening Section", ""))

insDoc(start_05_child, gLnk("R", "Overview of the Listening Section", ""))
insDoc(start_05_child, gLnk("R", "Review of Problems for the Listening Section", ""))
insDoc(start_05_child, gLnk("R", "Listening Strategies", ""))
insDoc(start_05_child, gLnk("R", "Applying the Academicc Skills to the TOELF", ""))
insDoc(start_05_child, gLnk("R", "Quiz for the Listening Section", ""))
insDoc(start_05_child, gLnk("R", "Study Plan", ""))
insDoc(start_05_child, gLnk("R", "Extra Credit", ""))
insDoc(start_05_child, gLnk("R", "Advisor`s Office", ""))

start_05_child = insFld(start_05, gFld("Speaking Section", ""))

insDoc(start_05_child, gLnk("R", "Overview of the Speaking Section", ""))
insDoc(start_05_child, gLnk("R", "Review of Problems for the Listening Section", ""))
insDoc(start_05_child, gLnk("R", "Speaking Strategies", ""))
insDoc(start_05_child, gLnk("R", "Applying the Academicc Skills to the TOELF", ""))
insDoc(start_05_child, gLnk("R", "Quiz for the Speaking Section", ""))
insDoc(start_05_child, gLnk("R", "Study Plan", ""))
insDoc(start_05_child, gLnk("R", "Extra Credit", ""))
insDoc(start_05_child, gLnk("R", "Advisor`s Office", ""))

start_05_child = insFld(start_05, gFld("Writting Section", ""))

insDoc(start_05_child, gLnk("R", "Overview of the Writting Section", ""))
insDoc(start_05_child, gLnk("R", "Review of Problems for the Writting Section", ""))
insDoc(start_05_child, gLnk("R", "Writting Strategies", ""))
insDoc(start_05_child, gLnk("R", "Applying the Academicc Skills to the TOELF", ""))
insDoc(start_05_child, gLnk("R", "Quiz for the Writting Section", ""))
insDoc(start_05_child, gLnk("R", "Study Plan", ""))
insDoc(start_05_child, gLnk("R", "Extra Credit", ""))
insDoc(start_05_child, gLnk("R", "Advisor`s Office", ""))
//end 5


//start model test 3
aux1 = insFld(foldersTree, gFld("MODEL TEST 3: PROGRESS TEST", ""))

//start reading section
aux2 = insFld(aux1, gFld("Reading Section", ""))
insDoc(aux2, gLnk("R", "Reading 01: Beowulf", ""))
insDoc(aux2, gLnk("R", "Reading 02: Thermoregulation", ""))
//end reading section


//start listening
aux2 = insFld(aux1, gFld("Listening Section", ""))
insDoc(aux2, gLnk("R", "Listening 01: Learning Center", ""))
insDoc(aux2, gLnk("R", "Listening 02: Geology Class", ""))
insDoc(aux2, gLnk("R", "Listening 03: Art Class", ""))
insDoc(aux2, gLnk("R", "Listening 04: Professor `s Office", ""))
insDoc(aux2, gLnk("R", "Listening 05: Astronomy Class", ""))
insDoc(aux2, gLnk("R", "Listening 06: Psychology Class", ""))
insDoc(aux2, gLnk("R", "Listening 07: Bookstore", ""))
insDoc(aux2, gLnk("R", "Listening 08: Environmental Science Class", ""))
insDoc(aux2, gLnk("R", "Listening 08: Philosophy Class", ""))
//end listening

aux2 = insFld(aux1, gFld("Speaking Section", ""))
insDoc(aux2, gLnk("R", "Independent Speaking Question 01: A Marriage Partner", ""))
insDoc(aux2, gLnk("R", "Integrated  Speaking Question 02: News", ""))
insDoc(aux2, gLnk("R", "Integrated  Speaking Question 03: Meal Plan", ""))
insDoc(aux2, gLnk("R", "Integrated  Speaking Question 04: Aboriginal People", ""))
insDoc(aux2, gLnk("R", "Integrated  Speaking Question 05: Scheduling Conflict", ""))
insDoc(aux2, gLnk("R", "Integrated  Speaking Question 05: Laboratory Microscope", ""))
aux2 = insFld(aux1, gFld("Writting Section", ""))
insDoc(aux2, gLnk("R", "Independent Essay: An Important Leader", ""))
insDoc(aux2, gLnk("R", "Integrated Essay: School Organization", ""))
//end model test 3

//start model test 4
aux1 = insFld(foldersTree, gFld("MODEL TEST 4: PROGRESS TEST", ""))

//start reading section
aux2 = insFld(aux1, gFld("Reading Section", ""))
insDoc(aux2, gLnk("R", "Reading 01: Beowulf", ""))
insDoc(aux2, gLnk("R", "Reading 02: Thermoregulation", ""))
//end reading section


//start listening
aux2 = insFld(aux1, gFld("Listening Section", ""))
insDoc(aux2, gLnk("R", "Listening 01: Learning Center", ""))
insDoc(aux2, gLnk("R", "Listening 02: Geology Class", ""))
insDoc(aux2, gLnk("R", "Listening 03: Art Class", ""))
insDoc(aux2, gLnk("R", "Listening 04: Professor `s Office", ""))
insDoc(aux2, gLnk("R", "Listening 05: Astronomy Class", ""))
insDoc(aux2, gLnk("R", "Listening 06: Psychology Class", ""))
insDoc(aux2, gLnk("R", "Listening 07: Bookstore", ""))
insDoc(aux2, gLnk("R", "Listening 08: Environmental Science Class", ""))
insDoc(aux2, gLnk("R", "Listening 08: Philosophy Class", ""))
//end listening

aux2 = insFld(aux1, gFld("Speaking Section", ""))
aux2 = insFld(aux1, gFld("Writting Section", ""))
//end model test 4


//start model test 5
aux1 = insFld(foldersTree, gFld("MODEL TEST 5: PROGRESS TEST", ""))

//start reading section
aux2 = insFld(aux1, gFld("Reading Section", ""))
insDoc(aux2, gLnk("R", "Reading 01: Beowulf", ""))
insDoc(aux2, gLnk("R", "Reading 02: Thermoregulation", ""))
//end reading section


//start listening
aux2 = insFld(aux1, gFld("Listening Section", ""))
insDoc(aux2, gLnk("R", "Listening 01: Learning Center", ""))
insDoc(aux2, gLnk("R", "Listening 02: Geology Class", ""))
insDoc(aux2, gLnk("R", "Listening 03: Art Class", ""))
insDoc(aux2, gLnk("R", "Listening 04: Professor `s Office", ""))
insDoc(aux2, gLnk("R", "Listening 05: Astronomy Class", ""))
insDoc(aux2, gLnk("R", "Listening 06: Psychology Class", ""))
insDoc(aux2, gLnk("R", "Listening 07: Bookstore", ""))
insDoc(aux2, gLnk("R", "Listening 08: Environmental Science Class", ""))
insDoc(aux2, gLnk("R", "Listening 08: Philosophy Class", ""))
//end listening

aux2 = insFld(aux1, gFld("Speaking Section", ""))
aux2 = insFld(aux1, gFld("Writting Section", ""))
//end model test 5

//start model test 6
aux1 = insFld(foldersTree, gFld("MODEL TEST 6: PROGRESS TEST", ""))

//start reading section
aux2 = insFld(aux1, gFld("Reading Section", ""))
insDoc(aux2, gLnk("R", "Reading 01: Beowulf", ""))
insDoc(aux2, gLnk("R", "Reading 02: Thermoregulation", ""))
//end reading section


//start listening
aux2 = insFld(aux1, gFld("Listening Section", ""))
insDoc(aux2, gLnk("R", "Listening 01: Learning Center", ""))
insDoc(aux2, gLnk("R", "Listening 02: Geology Class", ""))
insDoc(aux2, gLnk("R", "Listening 03: Art Class", ""))
insDoc(aux2, gLnk("R", "Listening 04: Professor `s Office", ""))
insDoc(aux2, gLnk("R", "Listening 05: Astronomy Class", ""))
insDoc(aux2, gLnk("R", "Listening 06: Psychology Class", ""))
insDoc(aux2, gLnk("R", "Listening 07: Bookstore", ""))
insDoc(aux2, gLnk("R", "Listening 08: Environmental Science Class", ""))
insDoc(aux2, gLnk("R", "Listening 08: Philosophy Class", ""))
//end listening

aux2 = insFld(aux1, gFld("Speaking Section", ""))
aux2 = insFld(aux1, gFld("Writting Section", ""))
//end model test 6

//start model test 7
aux1 = insFld(foldersTree, gFld("MODEL TEST 7: PROGRESS TEST", ""))

//start reading section
aux2 = insFld(aux1, gFld("Reading Section", ""))
insDoc(aux2, gLnk("R", "Reading 01: Beowulf", ""))
insDoc(aux2, gLnk("R", "Reading 02: Thermoregulation", ""))
//end reading section


//start listening
aux2 = insFld(aux1, gFld("Listening Section", ""))
insDoc(aux2, gLnk("R", "Listening 01: Learning Center", ""))
insDoc(aux2, gLnk("R", "Listening 02: Geology Class", ""))
insDoc(aux2, gLnk("R", "Listening 03: Art Class", ""))
insDoc(aux2, gLnk("R", "Listening 04: Professor `s Office", ""))
insDoc(aux2, gLnk("R", "Listening 05: Astronomy Class", ""))
insDoc(aux2, gLnk("R", "Listening 06: Psychology Class", ""))
insDoc(aux2, gLnk("R", "Listening 07: Bookstore", ""))
insDoc(aux2, gLnk("R", "Listening 08: Environmental Science Class", ""))
insDoc(aux2, gLnk("R", "Listening 08: Philosophy Class", ""))
//end listening

aux2 = insFld(aux1, gFld("Speaking Section", ""))
aux2 = insFld(aux1, gFld("Writting Section", ""))
//end model test 7

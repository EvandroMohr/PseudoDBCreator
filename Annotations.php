<?php

require('libs/addendum/annotations.php');

// Custom annotation  
class Persistent extends Annotation {}  
  
// Custom annotation  
/** @Target("class") */
class Table extends Annotation {}  

/** @Target("property") */
class Column extends Annotation {
    public $name;
    public $type;
}


/** @Target("property") */
class Id extends Annotation {}


class Join extends Annotation {
    public $joinTable;
    public $joinColumn;
}

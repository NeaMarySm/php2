<?php
namespace lesson6\hh;

class User implements \SplObserver{

    private $name;
    private $email;
    private $workExperience;

    public function __construct(string $name, string $email, int $workExperience)
    {
        $this->name = $name;
        $this->email = $email;
        $this->workExperience = $workExperience;
    }

    public function update(\SplSubject $vacancyExchange, string $category = null, $data = null): void
    {
        mail($this->email,
            "New Vacancy",
            "New vacancy on your subscription $category . Here's his info: " .json_encode($data));

        echo "New vacancy in $category has been emailed!\n";
    }
}
//
//  ViewController.swift
//  Hello_World
//
//  Created by Ivan Wei on 2020/10/23.
//

import UIKit

class ViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view.
    }

    @IBAction func showMessage(sender: UIButton) {
        // sender 是使用者所按下的按鈕
        let selectedButton = sender
        if let wordToLookup = selectedButton.titleLabel?.text {
            let alertControllor = UIAlertController(title: "Meaning", message: wordToLookup, preferredStyle: UIAlertController.Style.alert)
            alertControllor.addAction(UIAlertAction(title: "OK", style: UIAlertAction.Style.default, handler: nil))
            present(alertControllor, animated: true, completion: nil)
        }
    }
}

